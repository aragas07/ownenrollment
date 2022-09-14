<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingStudent extends Model
{
    use HasFactory;
    protected $table = 'incoming_students';
    protected $primaryKey = 'id';
}
