<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRecord extends Model
{
    use HasFactory;

    protected $casts = [
        'payment_method_log' => 'object',
    ];

    public function event()
    {
        return $this->belongsTo(EventRegistration::class);
    }
}
