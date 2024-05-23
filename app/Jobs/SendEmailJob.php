<?php

namespace App\Jobs;

use App\Mail\StoreMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    protected $email;

    public function __construct($email, $details)
    {
        $this->email = $email;
        $this->details = $details;
    }

    public function handle()
    {
        Mail::to($this->email)->send(new StoreMail($this->details));
    }
}
