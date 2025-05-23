<?php

namespace App\Models;
use Support\BaseModel;

class OrderAP extends BaseModel
{
    // Model logic here
    protected $table = 'orders_ap';
    protected $primaryKey = 'order_ap_id';

    public static function getID($id)
    {
        return self::query()->where('uuid','=',$id)->first();
    }
}
