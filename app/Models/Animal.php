<?php

namespace App\Models;

use App\Models\Adopter;
use App\Models\Rescuer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Animal extends Model
{
    use HasFactory;

    public function adopter(){
        return $this->belongsTo(Adopter::class);
    }

    public function rescuer(){
        return $this->belongsTo(Rescuer::class);
    }
}
