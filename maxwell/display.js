function displayFunc(nobj, myid, myname)
{
	var i = 0;
	document.write("<div style='font-family: helvetica; font-size: 15px;'>");

	for(i = 0; i < obj["data"].length; i++)
	{

		if(obj["data"][i]["type"] == "photo")
		{
			document.write("<div id='photodisp' style='width: 600px; word-wrap: break-word; background: #3b5998; color: white; padding-right: 20px; padding-left: 20px; padding-bottom: 5px; border-radius: 10px; -moz-border-radius: 10px; '>");
			document.write("<h1>Photo</h1>");
			if(typeof(obj["data"][i]["from"]) != "undefined")
			{
				document.write("<b>")
				document.write(obj["data"][i]["from"]["name"]);
				document.write("</b>")
			}

			//if gaurav posted on his own wall
			//if there is no to
			if(typeof(obj["data"][i]["to"]) != "undefined")
			{
				document.write(" to ");
				document.write(obj["data"][i]["to"]["data"][0]["name"]);
			}
			else if(typeof(obj["data"][i]["message"]) == "undefined")
			{
				document.write(" was tagged in this photo:");
			}
			else
			{
				document.write("");
			}
			document.write("<br/>");

			if(typeof(obj["data"][i]["message"]) != "undefined")
			{
				document.write(obj["data"][i]["message"]);

			}
			document.write("<br/>");
			var imagelink = obj["data"][i]["picture"];
			imagelink = imagelink.substring(0, imagelink.length-5);
			imagelink = imagelink + "n.jpg";
			
			
			
			document.write("<img src='"+imagelink+"' width=575px/>");
			var image=document.createElement("IMG");

			document.write("<br/>");
			document.write(obj["data"][i]["created_time"]);
			document.write("<br/>");
			if(typeof(obj["data"][i]["likes"]) != "undefined")
			{
				document.write("Likes: ");
				document.write(obj["data"][i]["likes"]["count"]);
			}
			document.write("<br/>");
			var k;
			document.write("<div style='background-color: #edeff4; font-size: 11px; width: 550px; color: black;'>")
			if(typeof(obj["data"][i]["comments"]) != "undefined")
			{
				document.write("&nbsp &nbsp");
				document.write("Comments");
				document.write("<br/>");
				for(k = 0; k < obj["data"][i]["comments"]["data"].length; k++)
				{
					document.write("<div style='border-bottom: 1px #e5eaf1 solid; margin-top: 4px; border-radius: 10px; -moz-border-radius: 10px; padding-left: 10px;'>");
					document.write("<b>");
					document.write(obj["data"][i]["comments"]["data"][k]["from"]["name"]);
					document.write("</b>");
					document.write("<br/>");
					document.write(obj["data"][i]["comments"]["data"][k]["message"]);
					document.write("<br/>");
					document.write("</div>");
				}
			}
			document.write("</div>");
			document.write("</div>");











		}
		else if(obj["data"][i]["type"] == "link")
		{
			document.write("<div id='linkdisp' style='width: 600px; word-wrap: break-word; background: #3b5998; color: white; padding-right: 20px; padding-left: 20px; padding-bottom: 5px; border-radius: 10px; -moz-border-radius: 10px; '>");
			document.write("<h1>Link</h1>");
			if(typeof(obj["data"][i]["from"]) != "undefined")
			{
					document.write("<b>")
					document.write(obj["data"][i]["from"]["name"]);
					document.write("</b>")
			}

			//if gaurav posted on his own wall
			if(typeof(obj["data"][i]["from"]) != "undefined")
			{
				if(obj["data"][i]["from"]["id"] == myid)
				{
					document.write(" posted:");
				}
				//if there is no to
				else if(typeof(obj["data"][i]["to"]) != "undefined")
				{
					document.write(" to ");
					document.write(obj["data"][i]["to"]["data"][0]["name"]);
				}
			}
			document.write("<br/>");
			document.write("<font size=20px>");
			document.write("<a href='");
			document.write(obj["data"][i]["link"]);
			document.write("'>");
			document.write(obj["data"][i]["link"]);
			document.write("</a>");
			document.write("</font>");
			document.write("<br/>");
			if((typeof(obj["data"][i]["message"]) != "undefined") && (obj["data"][i]["message"] != obj["data"][i]["link"]))
			{
				document.write(obj["data"][i]["message"]);
			}
			document.write("<br/>");
			document.write(obj["data"][i]["created_time"]);
			document.write("<br/>");
			if(typeof(obj["data"][i]["likes"]) != "undefined")
			{
				document.write("Likes: ");
				document.write(obj["data"][i]["likes"]["count"]);
			}
			document.write("<br/>");
			var k;
			document.write("<div style='background-color: #edeff4; font-size: 11px; width: 550px; color: black;'>")
			if(typeof(obj["data"][i]["comments"]) != "undefined")
			{
				document.write("&nbsp &nbsp");
				document.write("Comments");
				document.write("<br/>");
				for(k = 0; k < obj["data"][i]["comments"]["data"].length; k++)
				{
					document.write("<div style='border-bottom: 1px #e5eaf1 solid; margin-top: 4px; border-radius: 10px; -moz-border-radius: 10px; padding-left: 10px;'>");
					document.write("<b>");
					document.write(obj["data"][i]["comments"]["data"][k]["from"]["name"]);
					document.write("</b>");
					document.write("<br/>");
					document.write(obj["data"][i]["comments"]["data"][k]["message"]);
					document.write("<br/>");
					document.write("</div>");
				}
			}
			document.write("</div>");
			document.write("</div>");
		}










		else if(obj["data"][i]["type"] == "status")
		{
			document.write("<div id='statusdisp' style='width: 600px; word-wrap: break-word; background: #3b5998; color: white; padding-right: 20px; padding-left: 20px; padding-bottom: 5px; border-radius: 10px; -moz-border-radius: 10px; '>");
			document.write("<h1>Status</h1>");
			if(typeof(obj["data"][i]["from"]) != "undefined")
			{
					document.write("<b>")
					document.write(obj["data"][i]["from"]["name"]);
					document.write("</b>")
			}

			//if gaurav posted on his own wall
			if(typeof(obj["data"][i]["from"]) != "undefined")
			{
				if(obj["data"][i]["from"]["id"] == myid)
				{
					document.write(" posted:");
				}
				//if there is no to
				else if(typeof(obj["data"][i]["to"]) != "undefined")
				{
					document.write(" to ");
					document.write(obj["data"][i]["to"]["data"][0]["name"]);
				}
			}
			
			document.write("<br/>");

			if(typeof(obj["data"][i]["message"]) != "undefined")
			{
				document.write("<font size=20px>");
				document.write(obj["data"][i]["message"]);
				document.write("</font>");
			}
			document.write("<br/>");
			document.write(obj["data"][i]["created_time"]);
			document.write("<br/>");
			if(typeof(obj["data"][i]["likes"]) != "undefined")
			{
				document.write("Likes: ");
				document.write(obj["data"][i]["likes"]["count"]);
			}
			document.write("<br/>");
			var k;
			document.write("<div style='background-color: #edeff4; font-size: 11px; width: 550px; color: black;'>")
			if(typeof(obj["data"][i]["comments"]) != "undefined")
			{
				document.write("&nbsp &nbsp");
				document.write("Comments");
				document.write("<br/>");
				for(k = 0; k < obj["data"][i]["comments"]["data"].length; k++)
				{
					document.write("<div style='border-bottom: 1px #e5eaf1 solid; margin-top: 4px; border-radius: 10px; -moz-border-radius: 10px; padding-left: 10px;'>");
					document.write("<b>");
					document.write(obj["data"][i]["comments"]["data"][k]["from"]["name"]);
					document.write("</b>");
					document.write("<br/>");
					document.write(obj["data"][i]["comments"]["data"][k]["message"]);
					document.write("<br/>");
					document.write("</div>");
				}
			}
			document.write("</div>");
			document.write("</div>");
		}





		else if(obj["data"][i]["type"] == "video")
		{
			document.write("<div id='videodisp' style='width: 600px; word-wrap: break-word; background: #3b5998; color: white; padding-right: 20px; padding-left: 20px; padding-bottom: 5px; border-radius: 10px; -moz-border-radius: 10px; '>");
			document.write("<h1>Video</h1>");
			if(typeof(obj["data"][i]["from"]) != "undefined")
			{
	
					document.write("<b>")
					document.write(obj["data"][i]["from"]["name"]);
					document.write("</b>")
			}

			//if gaurav posted on his own wall
			//if there is no to
			if(typeof(obj["data"][i]["to"]) != "undefined")
			{
				document.write(" to ");
				document.write(obj["data"][i]["to"]["data"][0]["name"]);
			}
			else if(typeof(obj["data"][i]["message"]) == "undefined")
			{
				document.write(" was tagged in this vide:");
			}
			else
			{
				document.write("");
			}
			document.write("<br/>");

			if(typeof(obj["data"][i]["message"]) != "undefined")
			{
				document.write(obj["data"][i]["message"]);

			}
			document.write("<br/>");
			document.write("<a href='"+obj['data'][i]['link']+"' />");
			document.write("<img src='"+obj["data"][i]["picture"]+"'/>");
			document.write("</a>");

			document.write("<br/>");
			document.write(obj["data"][i]["created_time"]);
			document.write("<br/>");
			if(typeof(obj["data"][i]["likes"]) != "undefined")
			{
				document.write("Likes: ");
				document.write(obj["data"][i]["likes"]["count"]);
			}
			document.write("<br/>");
			var k;
			document.write("<div style='background-color: #edeff4; font-size: 11px; width: 550px; color: black;'>");
			if(typeof(obj["data"][i]["comments"]) != "undefined")
			{
				document.write("&nbsp &nbsp");
				document.write("Comments");
				document.write("<br/>");
				for(k = 0; k < obj["data"][i]["comments"]["data"].length; k++)
				{
					document.write("<div style='border-bottom: 1px #e5eaf1 solid; margin-top: 4px; border-radius: 10px; -moz-border-radius: 10px; padding-left: 10px;'>");
					document.write("<b>");
					document.write(obj["data"][i]["comments"]["data"][k]["from"]["name"]);
					document.write("</b>");
					document.write("<br/>");
					document.write(obj["data"][i]["comments"]["data"][k]["message"]);
					document.write("<br/>");
					document.write("</div>");
				}
			}
			document.write("</div>");
			document.write("</div>");
		}
		
		document.write("<br />");
		document.write("<hr width=620px align='left' style='height: 1px; border: 0px; clear: both; background-color: #d4d4d4; color: #d4d4d4;'/>");
		document.write("<br/>");
	}

	document.write("</div>");
}