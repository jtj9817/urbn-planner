<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;
      protected $fillable = ['address', 'street_id'];

      
    public function people(){
        return $this->hasMany(Person::class);
    }
    public function street(){
        return $this->belongsTo(Street::class);
    }
}