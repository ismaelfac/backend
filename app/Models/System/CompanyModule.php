<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyModule extends Model
{
    use HasFactory;

    protected $table = 'companies_modules';
    protected $fillable = ['company_id','module_id'];
    protected $casts = [];
}
