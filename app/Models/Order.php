<?php

namespace App\Models;
use Support\BaseModel;

class Order extends BaseModel
{
    // Model logic here
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    public static function getID($id)
    {
        return self::query()->where('uuid','=',$id)->first();
    }

    public static function getPOPrice($data)
    {
        return self::query()->where('order_id','=',$data)->first();
    }
}
