<?php

namespace App\Models;
use Support\BaseModel;

class Order extends BaseModel
{
    // Model logic here
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
}
