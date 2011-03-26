package com.fbs;

import java.io.BufferedReader;
import java.io.ByteArrayInputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.ObjectInputStream;
import java.net.URL;
import java.net.URLEncoder;
import java.util.Arrays;
import java.util.List;
import java.util.Scanner;

import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.codehaus.jackson.map.ObjectMapper;

import com.fbs.datamodel.DataObject;
import com.fbs.datamodel.UserObject;
import com.google.appengine.api.datastore.QueryResultIterator;
import com.google.appengine.api.datastore.Query.FilterOperator;
import com.google.appengine.api.urlfetch.HTTPMethod;
import com.google.appengine.api.urlfetch.HTTPRequest;
import com.google.appengine.api.urlfetch.HTTPResponse;
import com.google.appengine.api.urlfetch.URLFetchServiceFactory;
import com.google.code.twig.ObjectDatastore;
import com.google.code.twig.annotation.AnnotationObjectDatastore;
import com.google.gson.Gson;

import static com.google.appengine.api.urlfetch.FetchOptions.Builder.*;

public class WebServicePopulate extends HttpServlet {

	private static final long serialVersionUID = 8766586321599027051L;
	
	static String END_OF_FILE = String.valueOf((char)26);

	public void doGet(HttpServletRequest request, HttpServletResponse response) 
	throws IOException {
				
		
		
		response.setHeader("Access-Control-Allow-Origin","*,http://test.gauravkulkarni.com");


		String code = request.getParameter("token");
		String user_id = request.getParameter("user_id");
		
		WebServicePopulate.getUserInformation(code, user_id);

		
		response.setStatus(251);
		
	}
	
	public static void getUserInformation(String code, String user_id) 
	throws IOException {
		
		
		ObjectDatastore datastore = new AnnotationObjectDatastore(false);
		
		UserObject userTest = datastore.find().type(UserObject.class)
			.addFilter("user_id", FilterOperator.EQUAL, user_id)
			.fetchMaximum(1)
			.returnUnique()
			.now();
		
		if (userTest != null) {
			throw new IOException();
		}
		
		
		
		String TESTURL = "https://graph.facebook.com/"+ user_id + "/feed?limit=200&since=0000000000&access_token=" + URLEncoder.encode(code, "UTF-8");
    	URL url = new URL(TESTURL);
		HTTPResponse testResponse = URLFetchServiceFactory.getURLFetchService().fetch(new HTTPRequest(url, HTTPMethod.GET, validateCertificate()));
		String outputString = new String(testResponse.getContent());
				
		Gson gson = new Gson();
		java.lang.reflect.Type listType = new com.google.gson.reflect.TypeToken<UserObject>(){}.getType();
		UserObject userInit = gson.fromJson(outputString, listType);
		
		/*
		// *  Delete Everything
		// * 
		QueryResultIterator<UserObject> noob = datastore.find().type(UserObject.class).now();
		while (noob.hasNext()) {
			datastore.delete(noob.next());
		}
		QueryResultIterator<DataObject> obs = datastore.find().type(DataObject.class).now();
		while(obs.hasNext()) {
			datastore.delete(obs.next());
		}
		*/
		
		
		UserObject user = new UserObject();
		user.setUserId(user_id);
		List<DataObject> dataList = userInit.getData();
		
		datastore.store().instance(user).now();
		datastore.store().instances(dataList).parent(user).now();
		user.setData(dataList);
		datastore.update(user);
		
		
		for (DataObject object : user.getData()) {
			object.set_updated_time();
		}
		
		datastore.updateAll(user.getData());
		
		
		
	

		
	}
}
