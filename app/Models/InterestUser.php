<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InterestUser extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'interest_user';

    protected $fillable = ['user_id', 'interest_id'];

}
