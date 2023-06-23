<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;
    protected $fillable = [
        'owner_id', 
        'sender_origin_and_destinations_id',
        'receiver_origin_and_destinations_id',
        'sender_fence_id', 
        'receiver_fence_id',
        'type', 
        'import_salary', 
        'desamarre', 
        'desenlone', 
        'voucher',
        'to_load', 
        'amarre', 
        'enlone', 
        'currency', 
        'route_id'
    ];

    public function fees() {
        return $this->hasMany(AgreementFee::class);
    }

    protected $with = ['owner'];

    public function owner() {
        return $this->belongsTo(Owner::class);
    }

    public function route() {
        return $this->belongsTo(Route::class);
    }
}
