<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $table = 'education';
    protected $fillable = ['educationId','jobSeekerId','educName','board','year','percent'];
    protected $primaryKey='educationId';
    public $timestamps = false;
   
}
