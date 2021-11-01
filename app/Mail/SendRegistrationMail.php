<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $event;
    protected $no_of_ticket;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event, $no_of_ticket)
    {
        $this->event = $event;
        $this->no_of_ticket = $no_of_ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        if($this->event->location){
            $hasLocation = true; 
        }else{
            $hasLocation = false;
        }
        return $this->view('events.emails.registration')->with('event', $this->event)->with('noOfTickets',$this->no_of_ticket)->with('hasLocation',$hasLocation)->subject('Mogbomoya - Registration for '.$this->event->name);
    }
}
