<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgreementFee extends Model
{
    use HasFactory;
    protected $fillable = [
        'agreement_id',
        'fee_id',
        'currency',
        'amount',
        'retention'
    ];

    public function fee()
    {
        return $this->hasOne(Fee::class);
    }
}
