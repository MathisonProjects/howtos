# Laravel Commands and Jobs

- In your home directory, run the following commands.

```sh
php artisan make:command YourNewCommandName
php artisan make:job YourNewJobName
```

- Your files will be located in app/Jobs/YourNewJobName.php and app/Console/Commands/YourNewCommandName.php
- In app/Console/Commands/YourNewCommandName.php, add into your head:

```php
use App\Jobs\YourNewJobName;
```

- In app/Console/Commands/YourNewCommandName.php, add into your $signature variable the name of the command to fire from your console and into the $description variable the nature of your command. Inside of $signature, you may add arguments

```php
protected $signature = 'fire:yournewcommand {arg1} {arg2}'
protected $description = 'I am a classy description.';
```

- Inside of the handle method, insert the following:

```php
public function handle() {
	YourNewJobName::dispatch($this->argument('arg1'), $this->argument('arg2'));
}
```

- Save and close out your file.
- Open the file app/Jobs/YourNewJobName.php.
- Add the arguments you wish to use as public in your class.

```php
class YourNewJobName implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
```

- Add into your new job's construct a way to populate your arguments. If you do not, your handle function will not be able to access them.

```php
public function __construct($args) {
	$this->data = [
		'arg1' => $args['arg1'],
		'arg2' => $args['arg2']
	];
}
```

- Now in your handle, you can do what you please with your arguments!

```php
public function handle() {
	echo $this->data['arg1'];
	echo $this->data['arg2'];
}
```

- You may now fire your job through the command. But you may use your job anywhere in your application and dispatch it.

```sh
php artisan fire:yournewcommand "Hello" "World"
```

- Happy Coding!!!

### If you feel this guide was helpful...

Please give me a follow or subscribe in the following:

|Twitter|Github|Youtube|Twitch|Linkedin|Personal Site|
| ----- | ---- | ----- | ---- | ------ | ----------- |
|[MathisonProject](https://twitter.com/MathisonProject)|[Divinityfound](https://github.com/Divinityfound)|[Jacob Mathison](https://www.youtube.com/channel/UCNNxB1TRbdJxE_y51sJb9DA)|[MathisonProjects](http://twitch.tv/mathisonprojects)|[Jacob Mathison](https://www.linkedin.com/in/jacob-mathison-62359912/)|[Mathison Projects](http://mathisonprojects.com)|