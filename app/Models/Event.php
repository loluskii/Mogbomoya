<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory , SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tiers()
    {
        return $this->hasMany(Tier::class);
    }

    public function interests()
    {
        return $this->belongsToMany(Interest::class);
    }

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function subaccount()
    {
        return $this->hasOne(SubAccount::class);
    }
    
}
