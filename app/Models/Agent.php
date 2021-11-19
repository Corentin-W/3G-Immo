<?php

namespace App\Models;

use App\Models\Annonce;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agent extends Model
{
    use HasFactory;

    public function annonce()
    {
        return $this->hasMany(Annonce::class);
    }
}
