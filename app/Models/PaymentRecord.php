<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'payment_method_log' => 'object',
    ];

    public function event()
    {
        return $this->belongsTo(EventRegistration::class);
    }
}
