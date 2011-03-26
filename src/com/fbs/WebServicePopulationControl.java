package com.fbs;

import static com.google.appengine.api.urlfetch.FetchOptions.Builder.doNotValidateCertificate;

import java.io.IOException;
import java.net.URL;
import java.net.URLEncoder;
import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.fbs.datamodel.DataObjectPerson;
import com.fbs.datamodel.FriendList;
import com.fbs.datamodel.UserObject;
import com.google.appengine.api.taskqueue.*;
import com.google.appengine.api.urlfetch.HTTPMethod;
import com.google.appengine.api.urlfetch.HTTPRequest;
import com.google.appengine.api.urlfetch.HTTPResponse;
import com.google.appengine.api.urlfetch.URLFetchServiceFactory;
import com.google.code.twig.ObjectDatastore;
import com.google.code.twig.annotation.AnnotationObjectDatastore;
import com.google.gson.Gson;

public class WebServicePopulationControl extends HttpServlet {

	private static final long serialVersionUID = 1387411176687572221L;
	
	
	public void doGet(HttpServletRequest request, HttpServletResponse response) 
	throws IOException {
		
		response.setHeader("Access-Control-Allow-Origin","http://test.gauravkulkarni.com");		
		String code = request.getParameter("token");
		String user_id = request.getParameter("user_id");
						
		String TESTURL = "https://graph.facebook.com/"+ user_id + "/friends?access_token=" + URLEncoder.encode(code, "UTF-8");
		URL url = new URL(TESTURL);
		HTTPResponse testResponse = URLFetchServiceFactory.getURLFetchService().fetch(new HTTPRequest(url, HTTPMethod.GET, doNotValidateCertificate()));
		String outputString = new String(testResponse.getContent());
				
		Gson gson = new Gson();
		java.lang.reflect.Type listType = new com.google.gson.reflect.TypeToken<FriendList>(){}.getType();			
		FriendList friends = gson.fromJson(outputString, listType);
		
		List<DataObjectPerson> friendList = friends.getList();
		Iterator<DataObjectPerson> friendIterator = friendList.iterator();
	        
	    while (friendIterator.hasNext()) {
	        	
	     	DataObjectPerson currentUser = friendIterator.next();
	    	WebServicePopulate.getUserInformation(code, currentUser.getId());
	    	

        }
	}
}

