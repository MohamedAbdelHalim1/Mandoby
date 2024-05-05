<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NationalityUniversity extends Model
{
    use HasFactory;
    protected $fillable = [
        'nationality_id', 'university_id',
    ];

    protected $table = 'nationality_universities';


}
