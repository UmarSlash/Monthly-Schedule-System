<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    protected $fillable = ['name', 'email', 'gender', 'color', '_token'];
    use HasFactory, SoftDeletes;
}
