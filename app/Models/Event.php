<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'interest_category_id' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tiers()
    {
        return $this->hasMany(Tier::class);
    }

    public function categories() 
    {
        return InterestCategory::find($this->interest_category_id);
    }
}
