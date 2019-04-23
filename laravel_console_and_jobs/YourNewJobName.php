<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class YourNewJobName implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    public function __construct($args) {
        $this->data = [
            'arg1'       => $args['arg1'],
            'arg2'      => $args['arg2'],
        ];
    }

    public function handle() {
        echo $this->data['arg1'];
        echo $this->data['arg2'];
    }
}
