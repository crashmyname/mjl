<?php

namespace App\Models;
use Support\BaseModel;

class Invoice extends BaseModel
{
    // Model logic here
    protected $table = 'invoices';
    protected $primaryKey = 'invoice_id';
}
