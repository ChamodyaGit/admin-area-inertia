<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'address',
        'contact',
        'email',
        'gender',
        'date',
        'nic',
        'pimage',
        'status',
    ];
}
