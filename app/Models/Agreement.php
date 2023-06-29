<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id', 
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

    protected $with = ['customer', 'sender', 'receiver'];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function route() {
        return $this->belongsTo(Route::class);
    }

    public function sender() {
        return $this->belongsTo(OriginDestination::class, 'sender_origin_and_destinations_id');
    }

    public function receiver() {
        return $this->belongsTo(OriginDestination::class, 'receiver_origin_and_destinations_id');
    }
}
