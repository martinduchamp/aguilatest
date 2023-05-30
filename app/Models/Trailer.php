<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;

class Trailer extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function owners() {
        return $this->belongsToMany(Owner::class, 'owner_trailers');
    }
}
