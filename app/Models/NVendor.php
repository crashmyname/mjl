<?php

namespace App\Models;
use Support\BaseModel;

class NVendor extends BaseModel
{
    // Model logic here
    protected $table = 'vendor';
    protected $primaryKey = 'ven_id';

    public static function getID($id)
    {
        return self::query()->where('uuid','=',$id)->first();
    }
}
