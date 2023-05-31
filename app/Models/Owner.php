<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trailer;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'trailers'];
    protected $with = ['trailers'];

    public function trailers() {
        return $this->belongsToMany(Trailer::class, 'owner_trailers');
    }
}
