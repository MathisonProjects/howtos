<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    public function __construct($args) {
        $this->data = [
            'target'       => $args['target'],
            'subject'      => $args['subject'],
            'message'      => $args['message'],
        ];
    }

    public function handle() {
        $data = $this->data;
        Mail::send('mail.simpleEmail', ['data' => $data], function($message) use ($data) {
            $message->from('YOUREMAIL@gmail.com', 'Mail Job');
            $message->to($data['target'], 'Target Name');
            $message->subject($data['subject']);
        });
    }
}
