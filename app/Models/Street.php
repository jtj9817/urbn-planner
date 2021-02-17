<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'city_id'];

    public function houses(){
        return $this->hasMany(House::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
}
