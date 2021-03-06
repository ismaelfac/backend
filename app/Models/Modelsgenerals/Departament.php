<?php

namespace App\Models\Modelsgenerals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Traits\MethodsBase;
use App\Models\Modelsgenerals \{ Country, Municipality };
class Departament extends Model
{
    use MethodsBase, HasFactory;

    protected $fillable = ['description', 'short_name', 'country_id'];
    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }
    public static function factoryDepartament()
    {
        $result = Departament::whereNotIn('id', [0, -1])->where('country_id', 45)->pluck('id')->all();
        $response = self::randomFactory($result);
        return $response;
    }

}
