<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendEventNoteMail;
use Mail;
class SendNoteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    protected $event;
    protected $note;

  

    /**

     * Create a new job instance.

     *

     * @return void

     */

    public function __construct($details,$event,$note)

    {

        $this->details = $details;
        $this->event = $event;
        $this->note = $note;

    }
  

    /**

     * Execute the job.

     *

     * @return void

     */

    public function handle()

    {

        foreach($this->details->lazy() as $detail){
            $email = new SendEventNoteMail($this->event, $detail->name, $this->note);

            Mail::to($detail->email)->send($email);
        }
    }
}
