$(document).ready(function()
{
	$("#querysearch").hide();
	$("#namesearch").hide();
	$("#advanced").hide();
	$("#namesearcherror").hide();
	$("#placeholder").hide();
	$("#namesearch").fadeIn();
	$("#namesubmit").click(function()
	{
		$("#querysearch").slideDown(300);
		$("#namesubmit").fadeOut();
		$("#placeholder").fadeIn();
	});
	$("#advancedbutton").click(function()
	{
		$("#advanced").slideDown(300);
	});
})