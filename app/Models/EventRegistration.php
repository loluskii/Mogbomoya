<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    use HasFactory;

    protected $casts = [
        'tiers' => 'array',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
