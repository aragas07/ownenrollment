<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $table = 'semesters';

    protected $primaryKey = 'id';

    protected $fillable = [
        'created_at',
        'school_year',
        'semester',
        'email'
    ];
}
