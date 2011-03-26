package com.fbs.datamodel;

import com.google.appengine.api.datastore.Text;
import com.google.code.twig.annotation.*;

import java.io.IOException;
import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.List;


public class DataObject {

	   //GSON SPECIFIC THINGS
	   @Type(Text.class) @Index(true) private String id;
	   @Type(Text.class) @Index(true) private String caption;
	   @Type(Text.class) @Index(false) private String icon;
	   @Type(Text.class) @Index(true) private String name;
	   @Type(Text.class) @Index(true) private String link;
	   @Type(Text.class) @Index(true) private String message;
	   @Type(Text.class) @Index(false) private String picture;
	   @Type(Text.class) @Index(false) private String attribution;
	   @Index(false) private String updated_time;
	   @Index(false) private String created_time;
	   @Index(true) private String type;
	   
	 //Nested classes for entries
	   @Embedded private DataObjectPerson from;
	   @Embedded private DataObjectTo to;
	   @Embedded private List<DataObjectActions> actions;	
	   @Embedded private DataObjectComments comments;
	   @Embedded private DataObjectLikes likes;
	   
	   //TWIG SPECIFIC THINGS
	   @Index(true) private Date updated_time_twig;
	   
	   
	   
	   public DataObject() {
		   this.id = "";
		   this.link = "";
		   this.caption = "";
		   this.icon = "";
		   this.name = "";
		   this.message = "";
		   this.picture = "";
		   this.attribution = "";
		   this.updated_time = "";
		   this.created_time = "";
		   this.type = "";
	   }
	  
	   public String getType() {
		   return this.type;
	   }
	   
	   public String getCaption() {
		   return this.caption;
	   }
	   
	   public String getName() {
		   return this.name;
	   }
	   
	   public String getMessage() {
		   return this.message;
	   }
	   
	   public String getAttribution() {
		   return this.attribution;
	   }
	   
	   public void set_updated_time() {
		   try {
			   	String temp_date = this.updated_time.substring(0, 10);	   
			   	DateFormat df = new SimpleDateFormat("yyyy-MM-dd");
			  	Date today = df.parse(temp_date);
			  	this.updated_time_twig = today;
		   }
		   catch (ParseException e) {}
	   }
	   public String toString() {
		   String outputString = this.attribution+"\n"+this.caption+"\n"+this.created_time+"\n"+this.icon+this.id+"\n"+this.message+"\n"+this.name+
		   "\n"+this.picture+"\n"+this.type+"\n"+this.updated_time;
		   
		   return outputString;
		   
		   
	   }
	   
	   
	  
	   //Getter methods should be declared.  Setter methods are optional 
	   
	   
}
