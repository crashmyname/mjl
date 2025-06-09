<?php

namespace App\Models;
use Support\BaseModel;

class Price extends BaseModel
{
    // Model logic here
    protected $table = 'prices';
    protected $primaryKey = 'price_id';

    public static function getPrice($data)
    {
        return self::query()->where('vehicle_id','=',$data)->where('deleted_at','=',null)->get();
    }
}
