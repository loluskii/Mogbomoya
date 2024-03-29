<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventRegistration extends Model
{
    use HasFactory, SoftDeletes;

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function payment_records()
    {
        return $this->hasMany(PaymentRecord::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
