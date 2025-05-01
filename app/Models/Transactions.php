<?php

namespace App\Models;
use Support\BaseModel;

class Transactions extends BaseModel
{
    // Model logic here
    protected $table = 'transaction';
    protected $primaryKey = 'transaction_id';
}
