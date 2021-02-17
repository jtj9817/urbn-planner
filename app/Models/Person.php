<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'age', 'house_id'];

    public function cars(){
        return $this->hasMany(Car::class);
    }

    public function house(){
        return $this->belongsTo(House::class);
    }
}
