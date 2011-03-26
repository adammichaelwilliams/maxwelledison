package com.fbs.apptest;

import java.io.IOException;
import java.util.Arrays;

import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.fbs.datamodel.*;
import com.google.appengine.api.datastore.Query.FilterOperator;
import com.google.code.twig.ObjectDatastore;
import com.google.code.twig.annotation.AnnotationObjectDatastore;
import com.google.gson.Gson;
import com.google.gson.stream.*;

public class DataModelTest extends HttpServlet {

	private static final long serialVersionUID = 859823530877044374L;

	public void doGet(HttpServletRequest request, HttpServletResponse response) 
	throws IOException {

		 Gson gson = new Gson();
		 java.lang.reflect.Type listType = new com.google.gson.reflect.TypeToken(){}.getType();
		
	}
	
	public void doPost(HttpServletRequest request, HttpServletResponse response) 
	throws IOException {
		
		//ObjectDatastore datastore = new AnnotationObjectDatastore(false);
		
		/*
		 * Creating Objects
		
		UserObject newUser = new UserObject();
		DataObject obj1 = new DataObject(new Long(0));
		DataObject obj2 = new DataObject(new Long(1));
		
		datastore.store()
			.instance(newUser)
			.now();
		
		datastore.store()
			.instances(Arrays.asList(obj1, obj2))
			.parent(newUser)
			.now();
		*		
		*/
		
		
	}
}
