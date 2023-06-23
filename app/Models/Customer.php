<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'postal_code',
        'state',
        'city',
        'country',
        'area',
        'rfc',
        'currency',
        'bank_account',
        'tax_regime',
        'payment_type',
        'withholding',
        'iva_rate',
        'ledger_account',
        'exterior_number',
        'interior_number'
    ];

    public function emails() {
        return $this->hasMany(Email::class);
    }
}
