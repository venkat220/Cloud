<?php
header("Content-Type:application/json");
require "data.php";

if(!empty($_GET['usedcar']))
{
	$usedcar=$_GET['usedcar'];
	$model = get_price($model);
	
	if(empty($model))
	{
		response(200,"Used Not Found",NULL);
	}
	else
	{
		response(200,"Usedcar Found",$model);
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
	$response['data']=$data;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>
