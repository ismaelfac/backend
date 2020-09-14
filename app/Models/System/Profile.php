<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['title', 'description', 'is_state'];
    protected $casts = [];
}
