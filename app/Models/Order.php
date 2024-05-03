<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id', 'major_id','apply_order','receiving_all_papers',
        'paid_link','apply_at_university','order_accepted',
        'attached_card','package'
    ];

    public function member(){
        return $this->belongsTo(Member::class , 'member_id');
    }

    public function major(){
        return $this->belongsTo(Major::class , 'major_id');
    }

}
