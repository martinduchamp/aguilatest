<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fence extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];
}
