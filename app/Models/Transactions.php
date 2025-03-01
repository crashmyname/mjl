<?php

namespace App\Models;
use Support\BaseModel;

class Transactions extends BaseModel
{
    // Model logic here
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
}
