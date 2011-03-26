<?php
session_start();
include_once "fblogin.php";
?>

<html>
<head>

	<title>Facebook Search Engine</title>
	<link rel=stylesheet href="css/master.css">
	
	<script type="text/javascript" src="data.json"></script>
	<script type="text/javascript" src="jscript/jquery.js"></script>
	<script type="text/javascript" src="jscript/jqaction.js"></script>
	<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="jscript/thickbox.js"></script>
	
	
	<script type="text/javascript" src="display.js">


	<!-- Autocomplete liberrys-->
	<script src="jscript/jquery-latest.js"></script>
	  <link rel="stylesheet" href="css/autocompleteone.css" type="text/css" />
	  <link rel="stylesheet" href="css/autocompletetwo.css" type="text/css" />
	  <script type="text/javascript" src="jscript/jquery.bgiframe.min.js"></script>
	  <script type="text/javascript" src="jscript/jquery.autocomplete.js"></script>
	
	
	<script>	
	var friendlist=new Array();
		
	$(document).ready(function(){
	   	var friends=new Array();
		friendlist["<?php $la=$facebook->api('/me'); echo $la['name']; ?>"] = <?php echo $facebook->getUser();?>;
		friends.push("<?php echo $la['name']; ?>");
		<?php
		$friendslist = array_values($facebook->api('/me/friends/'));
		list($i,$data)=each($friendslist);
		while(list($i,$person)=each($data)){
			?>
				friendlist["<?php echo $person['name']; ?>"]=<?php echo $person['id']; ?>;
				friends.push("<?php echo $person['name']; ?>");
			<?php
		}
		?>
		
		var data = "Core Selectors Attributes Traversing Manipulation CSS Events Effects Ajax Utilities".split(" ");
	$("#facebookusername").autocomplete(friends);
	  });
	</script>
	
</head>
<body link="white" vlink="white" alink="white">

<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({appId: 'your app id', status: true, cookie: true,
             xfbml: true});
  };
  (function() {
    var e = document.createElement('script'); e.async = true;
    e.src = document.location.protocol +
      '//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);
  }());

  window.fbAsyncInit = function() {
	FB.Canvas.setSize({height:10000});
  }
</script>



	<script type="text/javascript">
		var token = "<?php echo substr($session['access_token'], 0, strlen($session['access_token'])); ?>";
		var userId = "<?php echo $facebook->getUser();?>";
		
		if (window.XMLHttpRequest)
		{
			xmlhttp=new XMLHttpRequest();
		}
		else
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.open("GET","http://fse-test.appspot.com/populate?token="+token+"&user_id="+userId, true);
		xmlhttp.setRequestHeader("Origin", "http://test.gauravkulkarni.com");
		xmlhttp.send();
		xmlhttp.onreadystatechange = function()
		{
		}
	</script>
	

<script type="text/javascript">
	function submitfunc()
	{
		var name = document.getElementById("facebookusername").value;
		var id=friendlist[name];
		var q = document.getElementById("facebookquery").value;
		var p = document.getElementById("photos");
		var l = document.getElementById("links");
		var w = document.getElementById("wallposts");
		var v = document.getElementById("videos");
		var e = document.getElementById("events");
		
		var date = document.getElementById("radiodate");
		var relevance = document.getElementById("radiorelevance");
		var popularity = document.getElementById("radiopopularity");
		
		var r;
		if(date.checked)
		{
			r = 0;
		}
		if(relevance.checked)
		{
			r = 1;
		}
		if(popularity.checked)
		{
			r = 2;
		}
		
		var check = "";
		if(w.checked)
		{
			check += "1";
		}
		else
		{
			check += "0";
		}
		if(p.checked)
		{
			check += "1";
		}
		else
		{
			check += "0";
		}
		if(l.checked)
		{
			check += "1";
		}
		else
		{
			check += "0";
		}
		if(v.checked)
		{
			check += "1";
		}
		else
		{
			check += "0";
		}
		
		if (window.XMLHttpRequest)
		{
			xmlhttp=new XMLHttpRequest();
		}
		else
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		//xmlhttp.open("GET","http://fse-test.appspot.com/query?q="+q+"&w="+check+"&r="+r+"&user_id="+id, true);
		//xmlhttp.send();
		//xmlhttp.onreadystatechange = function()
	 	//{
		//	if(xmlhttp.responseText!=""){
		//		var obj=eval('(' + xmlhttp.responseText + ')');
		//		var myid = <?php echo $facebook->getUser(); ?>;
		//		var myname = "<?php $blah= $facebook->api('/me'); echo $blah['name']; ?>";
				var obj;
				var myid;
				var myname;
				displayFunc(obj, myid, myname);
		//	} 
		//}
	}
</script>
	<div id="header">
	</div>
	<div id="namesearch" class="thebox">
		<div style="height: 90px">
		Who are you searching up?<br/>
		<input type="text" name="facebookusername" id="facebookusername" class="inputstyle"/><br/>
		<a href="#" id="namesubmit">Submit</a>
		</div>
		<div id="querysearch">
			What are you searching for?<br/>
			<input type="text" name="facebookquery" id="facebookquery" class="inputstyle"/><br/>
			<a href="#" onclick="javascript:submitfunc()">Search</a>&nbsp &nbsp<a href="#" id="advancedbutton">Advanced</a><br/>
		</div>

		<div id="advanced" style="height: 300px; margin-top: 30px;">
			<div id="advancedtype" >
				<input type="checkbox" name="photos" id="photos" value="photos" checked=true/>Photos <br/>
				<input type="checkbox" name="links" id="links" value="photos" checked=true/>Links <br/>
				<input type="checkbox" name="wallposts" id="wallposts" value="wallposts" checked=true/>Wall Posts <br/>
				<input type="checkbox" name="videos" id="videos" value="videos" checked=true/>Videos <br/>
				<input type="checkbox" name="events" id="events" value="events" />Events <br/>
			</div>
			<div id="advancedsortby">
				<form name="radioform">
					<input type="radio" name="sortby" id="radiodate" value="date" checked=true/>Date<br/>
					<input type="radio" name="sortby" id="radiorelevance" value="relevance" />Relevance<br />
					<input type="radio" name="sortby" id="radiopopularity" value="popularity" />Popularity <br/>
				</form>
			</div>
			<div id="advancedstartend">
				Start Date<input type="text" name="startdate" />
				End Date<input type="text" name="enddate"/>
			</div>
		</div>
	</div>
	
	<div id="namesearcherror">
		This is not a valid name!
	</div>
</body>
</html>