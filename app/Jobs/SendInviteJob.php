<?php

namespace App\Jobs;

use App\Mail\SendInviteMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendInviteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $invite;
    protected $invitee;
    protected $event;

    /**

     * Create a new job instance.

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

     * Execute the job.

     *

     * @return void

     */

    public function handle()

    {

        $email = new SendInviteMail($this->invite, $this->invitee, $this->event);

        Mail::to($this->invitee->email)->send($email);
    }
}
