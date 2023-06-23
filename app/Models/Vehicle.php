<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_number', 'type', 'plates', 'brand', 'vin', 'model', 'performance', 'color', 'workshop', 'excelco', 'energex', 'gps_id', 'policy']; 
    public function operator() {
        return $this->hasOne('App\Operator');
    }
}
