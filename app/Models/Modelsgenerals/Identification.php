<?php

namespace App\Models\Modelsgenerals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MethodsBase;
use App\Models\Modelsgenerals\Identification;

class Identification extends Model
{
    use MethodsBase, HasFactory;

    protected $fillable = ['description', 'shortName'];
    protected $guarded = 'id';
    public $timestamps = false;

    public static function factoryDni()
    {
        $num = Identification::whereNotIn('id', [0, 4, 5])->pluck('id')->all();
        return self::randomFactory($num);

    }
}
