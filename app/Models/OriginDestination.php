<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OriginDestination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'street',
        'rfc',
        'postal_code',
        'city',
        'exterior_number',
        'interior_number',
        'country',
        'state',
    ];
}
