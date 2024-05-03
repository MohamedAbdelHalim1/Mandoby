<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'photo',
    ];

    public function members(){
        return $this->hasMany(Member::class , 'nationality_id');
    }
}
