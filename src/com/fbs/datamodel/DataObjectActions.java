package com.fbs.datamodel;

import com.google.appengine.api.datastore.Text;
import com.google.code.twig.annotation.*;

public class DataObjectActions {

	   @Type(Text.class) @Index(false) private String link;
	   @Index(false) private String name;

	   //No Arg constructor
	   public DataObjectActions() {}
	
}
