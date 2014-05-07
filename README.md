Susbcribe to an Amazon SNS Topic over HTTP using the Cloudformation template. 

You will need to provide 
- SNS Topic Name - A new topic will be created 
- Key Name - Should already be existing 
- Instance Type
- EmailId to subscribe to SNS Topic - Optional

If you dont want to use the Cloudformation temaplte OR want to subscribe to an existing SNS Topic, do following - 
1. Create an IAM Role whcih has permissions of ConfirmSubscription and Subscribe to arn:aws:sns:<REGION>:<YOUR_ACCOUNT_ID:*
2. Launch an EC2 instance with above Role
3. Copy the PHP scripts in Document Root folder (ex. /var/www/html on Amazon Linux)
4. Execute the PHP script doSubscription.php <REGION> <TopicARN>
