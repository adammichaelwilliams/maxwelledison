<?php
# We require the library  
require("facebook.php");  
  
# Creating the facebook object  
$facebook = new Facebook(array(  
    'appId'  => '162869300433262',  
    'secret' => 'f74ac7b61cee11e6b226d520fb18cc41',  
    'cookie' => true  
));  
  
# Let's see if we have an active session 
$session = $facebook->getSession(); 
 
if(!empty($session)) { 
    # Active session, let's try getting the user id (getUser()) and user info (api->('/me'))  
    try{  
        $uid = $facebook->getUser();  
        $user = $facebook->api('/me');  
    } catch (Exception $e){}  
  
    if(!empty($user)){  
        # User info ok? Let's print it (Here we will be adding the login and registering routines) 
    } else { 
        # For testing purposes, if there was an error, let's kill the script  
        die("There was an error.");  
    }  
} else {  
    # There's no active session, let's generate one  
    $login_url = $facebook->getLoginUrl();
    $login_url = str_replace("http%3A%2F%2Ftest.gauravkulkarni.com%2Fmaxwell%2F","http%3A%2F%2Fapps.facebook.com%2Fmaxsfeed%2F", $login_url);
    $login_url = $login_url."&req_perms=read_stream";
    echo $login_url;
    ?>
	<script type="text/javascript">
	<!--
	top.location.href = "<?php echo $login_url; ?>";
	//-->
	</script>
	<?php
}  
?>