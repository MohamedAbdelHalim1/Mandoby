<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRequirementPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo', 'order_id',
    ];
}
