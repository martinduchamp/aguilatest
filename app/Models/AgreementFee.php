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

    protected $with = ['fee'];
    public function fee()
    {
        return $this->hasOne(Fee::class, 'id', 'fee_id');
    }

    public function fees()
    {
        return $this->belongsToMany(Fee::class, 'id', 'fee_id');
    }

    public function agreements()
    {
        return $this->belongsTo(Agreement::class, 'id', 'agreement_id');
    }
}
