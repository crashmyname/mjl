<?php

namespace App\Models;
use Support\BaseModel;

class Payment extends BaseModel
{
    // Model logic here
    protected $table = 'payments';
    protected $primaryKey = 'payment_id';
}
