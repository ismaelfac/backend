<?php

namespace App\Models\Modelsgenerals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Modelsgenerals \{ Departament };

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'description', 'nationality', 'short_name'];

    public $timestamps = false;

    public function departaments()
    {
        return $this->hasMany(Departament::class);
    }
}
