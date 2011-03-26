package com.fbs.datamodel;

import com.google.code.twig.annotation.*;

public class DataObjectPerson {
	
	   @Index(true) private String id;
	   @Index(true) private String name;

	   //No Arg constructor
	   public DataObjectPerson() {}
	   
	   public String getName() {
		   return this.name;
	   }

	public String getId() {
		return this.id;
	}

	   //Getter methods should be declared.  Setter methods are optional 
	
	
}
