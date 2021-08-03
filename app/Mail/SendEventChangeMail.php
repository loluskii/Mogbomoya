<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEventChangeMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $event;
    protected $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event, $name)
    {
        $this->event = $event;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('events.emails.change')->with('event', $this->event)->with('name', $this->name)->subject($this->event->name .' Change Of Event Details');
    }
}
