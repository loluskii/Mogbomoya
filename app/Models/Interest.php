<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    use HasFactory;

    protected $casts = [
        'interest_category' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories() 
    {
        return InterestCategory::find($this->interest_category);
    }
}
