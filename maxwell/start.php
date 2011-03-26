<?php
	include_once "fblogin.php";
?>
<html> 
 
<head> 
</head> 
 
<body> 
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
	FB.Canvas.setSize({height:2000});
  }
</script>
<?php
	$me = $facebook->api('/me/');
	echo $me['name'];
?>