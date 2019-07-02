# How to Use Laravel Mail

## Other How Tos
- [Laravel Console and Jobs](https://github.com/Divinityfound/howtos/tree/master/laravel_console_and_jobs)
- [Laravel Mail](https://github.com/Divinityfound/howtos/blob/master/laravel_mail/SendEmail.job.php)

## Programs/Services
- [AWS](https://console.aws.amazon.com)

## Files
- [.env](https://github.com/Divinityfound/howtos/blob/master/laravel_aws_mail/.env)
- [FireEmailCommand.php](https://github.com/Divinityfound/howtos/blob/master/laravel_aws_mail/FireEmailCommand.php)
- [FireEmailJob.php](https://github.com/Divinityfound/howtos/blob/master/laravel_aws_mail/FireEmailJob.php)
- [simpleEmail.blade.php](https://github.com/Divinityfound/howtos/blob/master/laravel_aws_mail/simpleEmail.blade.php)

## AWS Configuration

- Visit your AWS Dashboard for [Simple Email Service](https://console.aws.amazon.com/ses/home?region=us-east-1)
- Proceed to your [Domains](https://console.aws.amazon.com/ses/home?region=us-east-1#verified-senders-domain) for identity management.
- Add an email to email to in order to test your connection.
- Proceed to [SMTP Management](https://console.aws.amazon.com/ses/home?region=us-east-1#smtp-settings:).
- You may now update the following fields based on the informatino presented.

```.env
MAIL_DRIVER=smtp
MAIL_HOST=email-smtp.us-east-1.amazonaws.com
MAIL_PORT=587
MAIL_ENCRYPTION=tls
```
- Create your SMTP Credentials
- You may view your user profile in the [user dashboard](https://console.aws.amazon.com/iam/home?region=us-east-1#/users).
- You may add the SMTP Credentials for the username and password.

```.env
MAIL_USERNAME=your_aws_mail_id
MAIL_PASSWORD=your_aws_mail_password
```

- Use the [Laravel Console and Jobs](https://github.com/Divinityfound/howtos/tree/master/laravel_console_and_jobs) guide to create a command and job to fire your email.
- Use the [Laravel Mail](https://github.com/Divinityfound/howtos/blob/master/laravel_mail/SendEmail.job.php) guide to write the mail code.
- To dispatch your job (email), please refer to my [Laravel Console and Jobs](https://github.com/Divinityfound/howtos/tree/master/laravel_console_and_jobs) tutorial. An example of how to structure your command is available above in [SendEmail.command.php](https://github.com/Divinityfound/howtos/blob/master/laravel_mail/SendEmail.command.php)
- Upon firing, you will receive an email (or a related error) at your approved email.

- If you want to email anyone, you will need to submit a support ticket with AWS. They will also increase your daily email limit.

- Happy Coding!!!


### If you feel this guide was helpful...

Please give me a follow or subscribe in the following:

|Twitter|Github|Youtube|Twitch|Linkedin|Personal Site|
| ----- | ---- | ----- | ---- | ------ | ----------- |
|[MathisonProject](https://twitter.com/MathisonProject)|[Divinityfound](https://github.com/Divinityfound)|[Jacob Mathison](https://www.youtube.com/channel/UCNNxB1TRbdJxE_y51sJb9DA)|[MathisonProjects](http://twitch.tv/mathisonprojects)|[Jacob Mathison](https://www.linkedin.com/in/jacob-mathison-62359912/)|[Mathison Projects](http://mathisonprojects.com)|