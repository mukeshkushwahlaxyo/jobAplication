<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technical extends Model
{
    use HasFactory;
    protected $table = 'technical';
    protected $primaryKey='techId';
    protected $fillable = ['techId','jobSeekerId','techName','answer'];
    public $timestamps = false;
}
