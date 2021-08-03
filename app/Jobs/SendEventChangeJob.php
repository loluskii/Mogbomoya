<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendEventChangeMail;
use Mail;
class SendEventChangeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    protected $event;

  

    /**

     * Create a new job instance.

     *

     * @return void

     */

    public function __construct($details,$event)

    {

        $this->details = $details;
        $this->event = $event;

    }
  

    /**

     * Execute the job.

     *

     * @return void

     */

    public function handle()

    {
        foreach($this->details->lazy() as $detail){
            $email = new SendEventChangeMail($this->event, $detail->name);

            Mail::to($detail->email)->send($email);
        }
    }
}
