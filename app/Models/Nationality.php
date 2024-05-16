<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'photo', 'order'
    ];

    public function members(){
        return $this->hasMany(Member::class , 'nationality_id');
    }

    public function universities()
    {
        return $this->belongsToMany(University::class , 'nationality_universities' , 'nationality_id' , 'university_id');
    }

    public function faculties()
    {
        return $this->belongsToMany(Faculty::class , 'faculty_nationality_grades' , 'faculty_id' , 'nationality_id')->withPivot('degree');
    }
}
