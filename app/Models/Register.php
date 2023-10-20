<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','password','role','status'];
    protected $hidden = ['created_at','updated_at'];
}
