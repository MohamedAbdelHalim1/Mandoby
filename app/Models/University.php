<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'logo' ,'photo', 'details'
    ];

    public function faculties(){
        return $this->hasMany(Faculty::class , 'university_id');
    }

    public function nationalities()
    {
        return $this->hasManyThrough(Nationality::class, NationalityUniversity::class, 'university_id', 'id', 'id', 'nationality_id');
    }
}
