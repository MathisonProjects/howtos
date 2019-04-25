# How to Use Laravel Mail

## Other How Tos
- [Laravel Console and Jobs](https://github.com/Divinityfound/howtos/tree/master/laravel_console_and_jobs)

## Programs/Services
- [Gmail](http://gmail.com)

## Commands
```sh
php artisan make:job SendEmail
php artisan make:command SendEmail
```

## Files
- [app/Jobs/SendEmail.php](https://github.com/Divinityfound/howtos/blob/master/laravel_mail/SendEmail.job.php)
- [app/Console/Commands/SendEmail.php](https://github.com/Divinityfound/howtos/blob/master/laravel_mail/SendEmail.command.php)
- [.env](https://github.com/Divinityfound/howtos/blob/master/laravel_mail/.env)
- [resources/views/mail/ExampleEmail.blade.php](https://github.com/Divinityfound/howtos/blob/master/laravel_mail/ExampleEmail.blade.php)

## Creating the Emailing Structure

- First create your job and command for firing emails in Laravel.

```sh
php artisan make:job SendEmail
php artisan make:command SendEmail
```

- Create the template for sending your email inside of the directory /resources/views/mail/ExampleEmail.blade.php
- Place the following placeholder information inside of the email.
```php
{{ $data['target'] }}
{{ $data['subject'] }}
{{ $data['message'] }}
```

- Create your email from [Gmail](http://gmail.com). Log the username and password.
- Inside of [.env](https://github.com/Divinityfound/howtos/blob/master/laravel_mail/.env), modify a few of the following keys with your credentials for gmail's SMTP service.

```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=YOUREMAIL@gmail.com
MAIL_PASSWORD=YOURPASSWORD
MAIL_ENCRYPTION=SSL
```

- Open your file [app/Jobs/SendEmail.php](https://github.com/Divinityfound/howtos/blob/master/laravel_mail/SendEmail.job.php).
- Add the following around construct.

```php
    public $data;

    public function __construct($args) {
        $this->data = [
            'target'       => $args['target'],
            'subject'      => $args['subject'],
            'message'      => $args['message'],
        ];
    }
```

- Now you need to structure your code to fire your email.

```php
    public function handle() {
        $data = $this->data;
        Mail::send('mail.simpleEmail', ['data' => $data], function($message) use ($data) {
            $message->from('YOUREMAIL@gmail.com', 'Mail Job');
            $message->to($data['target'], 'Target Name');
            $message->subject($data['subject']);
        });
    }
```

- To dispatch your job (email), please refer to my [Laravel Console and Jobs](https://github.com/Divinityfound/howtos/tree/master/laravel_console_and_jobs) tutorial. An example of how to structure your command is available above in SendEmail.command.php
- Upon firing, you will receive an email (or a related error) at your target email.
- Possible solutions to look out for would be in the [.env](https://github.com/Divinityfound/howtos/blob/master/laravel_mail/.env)'s Encryption. TSL and SSL are important and need to refer to the port you are using.

- DISCLAIMER: There are sometimes security concerns that google will bring up if it notices strange activity, and there are daily limits for you to be considerate of. Added, there is no guarantee that your email will be delivered without being marked as spam. There are a plethora of other services available (eg: Mailgun, AWS Simple Mail Service, Mailchimp, etc) that will up your delivery rate.

- Happy Coding!!!


### If you feel this guide was helpful...

Please give me a follow or subscribe in the following:

|Twitter|Github|Youtube|Twitch|Linkedin|Personal Site|
| ----- | ---- | ----- | ---- | ------ | ----------- |
|[MathisonProject](https://twitter.com/MathisonProject)|[Divinityfound](https://github.com/Divinityfound)|[Jacob Mathison](https://www.youtube.com/channel/UCNNxB1TRbdJxE_y51sJb9DA)|[MathisonProjects](http://twitch.tv/mathisonprojects)|[Jacob Mathison](https://www.linkedin.com/in/jacob-mathison-62359912/)|[Mathison Projects](http://mathisonprojects.com)|