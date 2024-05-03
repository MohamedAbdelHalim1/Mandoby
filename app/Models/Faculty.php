<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'degree' ,'photo', 'university_id'
    ];

    public function university(){
        return $this->belongsTo(University::class ,'university_id');
    }

    public function majors(){
        return $this->hasMany(Major::class , 'faculty_id');
    }

}
