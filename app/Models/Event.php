<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'interest_category_id' => 'array',
        'tiers' => 'array',
        'tiers_left' => 'array',
    ];
}
