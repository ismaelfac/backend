<?php

namespace App\Models\Modelsgenerals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Traits\MethodsBase;
use App\Models\Modelsgenerals \{ Departament, Municipality, Location };

class Municipality extends Model
{
    use MethodsBase, HasFactory;

    protected $fillable = ['description', 'departament_id'];
    public $timestamps = false;

    public function departament()
    {
        return $this->belongsTo(Departament::class);
    }
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
    public function getUrlAttribute()
    {
        return route('municipality.show', $this->id);
    }
    public static function factoryMunicipality($departament)
    {
        $result = Municipality::whereNotIn('id', [0, -1])->where('departament_id', $departament)->pluck('id')->all();
        $response = self::randomFactory($result);
        return $response;
    }
}
