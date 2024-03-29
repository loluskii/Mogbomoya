<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InterestEvent extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'event_interest';

    protected $fillable = ['event_id', 'interest_id'];

}
