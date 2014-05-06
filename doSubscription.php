<?php

require 'AWSSDKforPHP/aws.phar';
date_default_timezone_set('Asia/Calcutta');
use Aws\Sns\SnsClient;

$region = $argv[1];
$topicARN = $argv[2];
$subscriberEndpoint = file_get_contents("http://169.254.169.254/latest/meta-data/public-hostname/");

$client = SnsClient::factory(array(
    'region' => $region, // (e.g., us-west-2)
));
$result = $client->subscribe(array(
    'TopicArn' => $topicARN,
    'Protocol' => 'http',
    'Endpoint' => $subscriberEndpoint
));

?>
