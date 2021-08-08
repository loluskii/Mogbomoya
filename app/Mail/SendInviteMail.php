<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInviteMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $invite;
    protected $invitee;
    protected $event;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invite, $invitee, $event)
    {
        $this->invite = $invite;
        $this->invitee = $invitee;
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('events.emails.invite')->with('event', $this->event)->with('nameOfInvite', $this->invite->name)->with('nameOfInvitee', $this->invitee->name)->subject($this->event->name. ' Invite');
    }
}
