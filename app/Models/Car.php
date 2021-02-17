<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['license_plate', 'brand', 'color', 'person_id'];

    public function person(){
        return $this->belongsTo(Person::class);
    }
}
