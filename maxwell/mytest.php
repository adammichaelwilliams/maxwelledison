<?php
session_start();
include_once "fblogin.php";
?>

<html>
<head>
</head>
<body>
<script type="text/javascript" src="<?php echo $_GET['var'];?>"></script>
<script type="text/javascript">
var myid = <?php echo $facebook->getUser();?>;
var myname = "<?php $blah = $facebook->api("/me"); echo $blah["name"];?>";
var i = 0;
for(i = 0; i < obj["data"].length; i++)
{
	document.write("<br />");
	document.write("<hr width='50%' align='left'/>");
	document.write("<br/>");
	if(obj["data"][i]["type"] == "photo")
	{
		document.write("<div id='photodisp'>");
		document.write(obj["data"][i]["from"]["name"]);
		
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
		document.write("<a href='"+obj["data"][i]["link"]+"'>");
		document.write("<img src='"+obj["data"][i]["picture"]+"'/>");
		document.write("</a>");
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
		if(typeof(obj["data"][i]["comments"]) != "undefined")
		{
			document.write("Comments");
			document.write("<br/>");
			for(k = 0; k < obj["data"][i]["comments"]["data"].length; k++)
			{
				document.write(obj["data"][i]["comments"]["data"][k]["from"]["name"]);
				document.write("<br/>");
				document.write(obj["data"][i]["comments"]["data"][k]["message"]);
				document.write("<br/>");
			}
		}
		document.write("</div>");
		
		
		
		
		
		
		
		
		
		
		
	}
	else if(obj["data"][i]["type"] == "link")
	{
		document.write("<div id='linkdisp'>");
		document.write(obj["data"][i]["from"]["name"]);
		
		//if gaurav posted on his own wall
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
		document.write("<br/>");
		document.write("<a href='");
		document.write(obj["data"][i]["link"]);
		document.write("'>");
		document.write(obj["data"][i]["link"]);
		document.write("</a>");
		document.write("<br/>");
		document.write(obj["data"][i]["created_time"]);
		document.write("<br/>");
		if(typeof(obj["data"][i]["message"]) != "undefined")
		{
			document.write(obj["data"][i]["message"]);
		}
		document.write("<br/>");
		if(typeof(obj["data"][i]["likes"]) != "undefined")
		{
			document.write("Likes: ");
			document.write(obj["data"][i]["likes"]["count"]);
		}
		document.write("<br/>");
		var k;
		if(typeof(obj["data"][i]["comments"]) != "undefined")
		{
			document.write("Comments");
			document.write("<br/>");
			for(k = 0; k < obj["data"][i]["comments"]["data"].length; k++)
			{
				document.write(obj["data"][i]["comments"]["data"][k]["from"]["name"]);
				document.write("<br/>");
				document.write(obj["data"][i]["comments"]["data"][k]["message"]);
				document.write("<br/>");
			}
		}
		document.write("</div>");
	}
	
	
	
	
	
	
	
	
	
	
	else if(obj["data"][i]["type"] == "status")
	{
		document.write("<div id='statusdisp'>");
		document.write(obj["data"][i]["from"]["name"]);
		
		//if gaurav posted on his own wall
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
		document.write("<br/>");
		
		if(typeof(obj["data"][i]["message"]) != "undefined")
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
		if(typeof(obj["data"][i]["comments"]) != "undefined")
		{
			document.write("Comments");
			document.write("<br/>");
			for(k = 0; k < obj["data"][i]["comments"]["data"].length; k++)
			{
				document.write(obj["data"][i]["comments"]["data"][k]["from"]["name"]);
				document.write("<br/>");
				document.write(obj["data"][i]["comments"]["data"][k]["message"]);
				document.write("<br/>");
			}
		}
		document.write("</div>");
	}
	
	
	
	
	
	else if(obj["data"][i]["type"] == "video")
	{
		document.write("<div id='videodisp'>");
		document.write(obj["data"][i]["from"]["name"]);
		
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
		document.write("<a href='" + obj["data"][i]["link"] +"'>");
		document.write("<img src='"+obj["data"][i]["picture"]+"'/>");
		document.write("</a>");
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
		if(typeof(obj["data"][i]["comments"]) != "undefined")
		{
			document.write("Comments");
			document.write("<br/>");
			for(k = 0; k < obj["data"][i]["comments"]["data"].length; k++)
			{
				document.write(obj["data"][i]["comments"]["data"][k]["from"]["name"]);
				document.write("<br/>");
				document.write(obj["data"][i]["comments"]["data"][k]["message"]);
				document.write("<br/>");
			}
		}
		document.write("</div>");
	}
}

</script>
</body>
</html>