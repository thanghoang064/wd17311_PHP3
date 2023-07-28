<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "students"; // phải điền đúng tên bảng mà mình cần trỏ tới trong csdl
    protected $fillable = ['id','name','email','image'];
}
