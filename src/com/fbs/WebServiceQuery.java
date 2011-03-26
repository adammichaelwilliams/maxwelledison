package com.fbs;

import java.io.IOException;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.fbs.datamodel.*;
import com.google.appengine.api.datastore.Query.FilterOperator;
import com.google.appengine.api.datastore.Query.SortDirection;
import com.google.appengine.api.datastore.QueryResultIterator;
import com.google.code.twig.FindCommand.MergeOperator;
import com.google.code.twig.FindCommand.RootFindCommand;
import com.google.code.twig.ObjectDatastore;
import com.google.code.twig.annotation.AnnotationObjectDatastore;
import com.google.gson.Gson;



public class WebServiceQuery extends HttpServlet {

	private static final long serialVersionUID = 3784942323739231043L;
	
	public void doGet(HttpServletRequest request, HttpServletResponse response)
	throws IOException {
		
		try {
		
		ObjectDatastore datastore = new AnnotationObjectDatastore(false);	
		
		UserObject returnUser = new UserObject();
		
		response.setHeader("Access-Control-Allow-Origin","*,http://test.gauravkulkarni.com");
		String user_id = request.getParameter("user_id");
		String params_word = request.getParameter("w");
		String query_string = request.getParameter("q").toLowerCase();
		
		QueryResultIterator<UserObject> userIterator = datastore.find()
			.type(UserObject.class)
			.addFilter("user_id", FilterOperator.EQUAL, user_id)
			.now();
		
		UserObject user = userIterator.next();
		
		QueryResultIterator<DataObject> objectIterator = datastore.find()
			.type(DataObject.class)
			.addSort("updated_time_twig", SortDirection.DESCENDING)		//Defaulting to Date
			.ancestor(user)
			.now();
		
		List<DataObject> objectList = new ArrayList<DataObject>();
		
		while(objectIterator.hasNext()) {
			DataObject object = objectIterator.next();
			
			if(!this.validateParams(params_word, object)) {
				continue;
			}
			
			if(!this.validateSearch(query_string, object)) {
				continue;
			}

			objectList.add(object);
		}
				
		returnUser.setData(objectList);
		Gson gson = new Gson();	
		
		response.getWriter().println(gson.toJson(returnUser));
		
		}
		catch (Exception e) {}
		
				
	}
	
	private boolean validateSearch(String query, DataObject object) {
		if (object.getAttribution().toLowerCase().contains(query)) {
			return true;
		}
		
		if (object.getCaption().toLowerCase().contains(query)) {
			return true;
		}
		
		if (object.getMessage().toLowerCase().contains(query)) {
			return true;
		}
		
		if (object.getName().toLowerCase().contains(query)) {
			return true;
		}
		
		return false;
	}
	
	private boolean validateParams(String params_word, DataObject object) {
		if ((params_word.charAt(0) == '0') && (object.getType().equals("status"))) {
			return false;
		}
		
		if ((params_word.charAt(1) == '0') && (object.getType().equals("photo"))) {
			return false;
		}

		if ((params_word.charAt(2) == '0') && (object.getType().equals("link"))) {
			return false;
		}

		if ((params_word.charAt(3) == '0') && (object.getType().equals("video"))) {
			return false;
		}
		
		return true;
	}
}
