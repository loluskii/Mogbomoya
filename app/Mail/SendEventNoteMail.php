<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEventNoteMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $event;
    protected $name;
    protected $note;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event, $name, $note)
    {
        $this->event = $event;
        $this->name = $name;
        $this->note = $note;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('events.emails.note')->with('event', $this->event)->with('name', $this->name)->with('note', $this->note)->subject('About '.$this->event->name);
    }
}
