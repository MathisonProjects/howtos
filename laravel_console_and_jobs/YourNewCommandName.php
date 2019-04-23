<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\YourNewJobName;

class YourNewCommandName extends Command
{
	protected $signature = 'fire:yournewcommand {arg1} {arg2}'
	protected $description = 'I am a classy description.';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        YourNewCommandName::dispatch($this->argument('arg1'), $this->argument('arg2'));
    }
}
