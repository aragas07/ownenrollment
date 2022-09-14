<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignationEmployee extends Model
{
    use HasFactory;
    
    protected $table = 'designation_employees';

    protected $primaryKey = 'id';

    protected $fillable = [
        'employee_id',
        'designation_id',
        'designation_role',
        'academic_year',
        'semester',
        'assigned_by',
        'date_assign',
    ];
}
