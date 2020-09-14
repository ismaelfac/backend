<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon as Carbon;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['person_id','state_customer'];
    protected $casts = [

    ];



}
