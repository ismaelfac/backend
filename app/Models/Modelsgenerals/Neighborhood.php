<?php

namespace App\Models\Modelsgenerals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Traits\MethodsBase;
use App\Models\Modelsgenerals \{ Location };

class Neighborhood extends Model
{
    use MethodsBase, HasFactory;
    protected $fillable = ['description', 'id_location'];
    public $timestamps = false;


    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public static function factoryNeighborhood($location)
    {
        $result = Neighborhood::whereNotIn('id', [0, -1])->where('location_id', $location)->pluck('id')->all();
        isset($result) ? $response = 1 : $response = self::randomFactory($result);
        return $response;
    }
}
