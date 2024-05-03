<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'photo', 'basic_service_id'
    ];

    public function BasicService(){
        return $this->belongsTo(BasicService::class ,'basic_service_id');
    }
}
