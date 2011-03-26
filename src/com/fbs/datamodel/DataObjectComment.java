package com.fbs.datamodel;

import com.google.appengine.api.datastore.Text;
import com.google.code.twig.annotation.*;

public class DataObjectComment {
	
	@Index(true) private String id;
	@Type(Text.class) @Index(true) private String message;
	@Index(false) private String created_time;
	@Embedded private DataObjectPerson from;
	
	public DataObjectComment() {}

}
