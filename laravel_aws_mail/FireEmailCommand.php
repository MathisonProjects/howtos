<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Jobs\FireAwsEmail as faeJob;
class FireAwsEmail extends Command
{
    protected $signature = 'fire:email';

    protected $description = 'Fires AWS Email';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $data = [
            'target' => 'jacob@mathisonprojects.com',
            'subject' => 'Test AWS Email.',
            'message' => 'This is a message.'
        ];
        faeJob::dispatch($data);
    }
}
