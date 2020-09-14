<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CustomerRol extends Pivot
{
    use SoftDeletes, HasFactory;
    protected $dates = ['deleted_at'];
}
