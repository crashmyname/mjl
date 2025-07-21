<?php

namespace App\Models;
use Support\BaseModel;

class Employees extends BaseModel
{
    // Model logic here
    protected $table = 'employees';
    protected $primaryKey = 'employee_id';
}
