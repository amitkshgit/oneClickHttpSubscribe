Susbcribe to an Amazon SNS Topic over HTTP using the Cloudformation template. 

You will need to provide 
- SNS Topic Name - A new topic will be created 
- Key Name - Should already be existing 
- Instance Type
- EmailId to subscribe to SNS Topic - Optional

If you dont want to use the Cloudformation template OR want to subscribe to an existing SNS Topic, do following - 
- Create an IAM Role which has permissions of ConfirmSubscription and Subscribe to arn:aws:sns:YOURREGION:YOURACCOUNTID:*
- Launch an EC2 instance with above Role
- Copy the PHP scripts in Document Root folder (ex. /var/www/html on Amazon Linux)
- Execute the PHP script doSubscription.php REGION TopicARN
