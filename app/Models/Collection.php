<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use HasFactory , SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event_collections()
    {
        return $this->hasMany(EventCollection::class);
    }
}
