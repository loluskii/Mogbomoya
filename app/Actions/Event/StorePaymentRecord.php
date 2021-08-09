<?php

namespace App\Actions\Event;

use App\Models\PaymentRecord;
use App\Models\Event;

class StorePaymentRecord
{
    public function run($response, $registration, $event_id)
    {
        $event = Event::find($event_id);
        $payment = new PaymentRecord;
        $payment->event_registration_id = $registration->id;
        $payment->amount = $response['amount'] / 100;
        $payment->user_id = $response['metadata']['user_details']['user_id'];
        $payment->email = $response['metadata']['user_details']['email'];
        $payment->phone_number = $response['metadata']['user_details']['phone_number'] ?? null;
        $payment->description = 'Payment For '.$event->name;
        $payment->payment_method = 'Paystack';
        $payment->payment_method_log = $response;
        $payment->save();
    }
}
