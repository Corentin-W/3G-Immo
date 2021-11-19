<?php

namespace App\Models;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Annonce extends Model
{
    use HasFactory;


    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
