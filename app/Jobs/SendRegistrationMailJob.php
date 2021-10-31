<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\SendRegistrationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendRegistrationMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $event;
    protected $email;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($event, $email)
    {
        $this->event = $event;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new SendRegistrationMail($this->event);
        
        Mail::to($this->email)->send($email);
    }
}
