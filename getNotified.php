<?php

// Part of the Cloudformation Stack 
// to subscribe to an SNS Topic
// over http in one click 
// Needs IAM Role access to subscribe to a topic

require 'AWSSDKforPHP/aws.phar';
date_default_timezone_set('Asia/Calcutta');
use Aws\Sns\SnsClient;

ini_set("log_errors", 1);
ini_set("#error_log", "/tmp/php-error.log");
error_log("Starting....");
error_log(date("Y-m-d H:i:s"));
 
$jsonMetadata = file_get_contents("http://169.254.169.254/latest/dynamic/instance-identity/document/");
$decodedjsonMetadata = json_decode($jsonMetadata);
$region = $decodedjsonMetadata->{'region'};
$bodyis = file_get_contents('php://input');
#error_log("Body: $bodyis",0);
$obj = json_decode($bodyis);
$type = $obj->{'Type'};
if(strpos($type,"SubscriptionConfirmation") === 0){
error_log("This is SNS Subscription Confirmation Request");
$susbscribeURL = $obj->{'SubscribeURL'};
$snstoken = $obj->{'Token'};
$snsARN = $obj->{'TopicArn'};
error_log("SubscribeURL: $susbscribeURL", 0);
error_log("SNSToken: $snstoken", 0);
error_log("TokenARN: $snsARN", 0);
$client = SnsClient::factory(array(
    'region' => $region, // (e.g., us-west-2)
));
$result = $client->confirmSubscription(array(
    'TopicArn' => $snsARN,
    'Token' => $snstoken
));
error_log("API_CONFIRM: $result");
}else{
	// Your custom code can go here
}

?>
