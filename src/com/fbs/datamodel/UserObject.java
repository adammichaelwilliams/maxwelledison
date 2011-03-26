package com.fbs.datamodel;

import java.util.ArrayList;
import java.util.List;

import com.google.code.twig.annotation.*;

public class UserObject {
	
	//Collection of entries
		   private List<DataObject> data;
		   @Index(true) private String user_id;
		   @Index(true) private int total_comments;
		   @Index(true) private int total_likes;

		   //No Arg constructor
		   public UserObject() {}
		   
		   public UserObject(List<DataObject> data) {
			   this.setData(data);
		   }

		   public void setUserId(String id) {
			   this.user_id = id;
		   }
		   
		   public String getUserId() {
			   return this.user_id;
		   }
		 
		   public void setData(List<DataObject> data) {
			   this.data = data;
		   }
		   
		   public List<DataObject> getData() {
		      return this.data;
		   }
		   
}
