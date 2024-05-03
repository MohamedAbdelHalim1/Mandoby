<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicService extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'photo',
    ];

    public function SubServices(){
        return $this->hasMany(BasicService::class ,'basic_service_id');
    }
}
