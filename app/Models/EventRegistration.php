<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventRegistration extends Model
{
    use HasFactory , SoftDeletes;

    protected $casts = [
        'tiers' => 'array',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
