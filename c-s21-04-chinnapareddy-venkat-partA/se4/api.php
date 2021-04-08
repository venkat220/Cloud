<?php
header("Content-Type:application/json");
require "data.php";

if(!empty($_GET['usedcar']) and !empty($_GET['model']))
{
	$usedcar=$_GET['usedcar'];
	$model=$_GET['model'];

	$r = get_price($usedcar,$model);
	
	if(empty($r))
	{
		response(200,"Cars Not Found",NULL);
	}
	else
	{
		response(200,"Cars Found",$r);
	}	
}
else
{
	response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data is correct']=$data;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>