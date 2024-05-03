<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'faculty_id','qualification','requirement'
    ];

    public function faculty(){
        return $this->belongsTo(Faculty::class , 'faculty_id');
    }


    public function orders(){
        return $this->hasMany(Order::class , 'major_id');
    }
}
