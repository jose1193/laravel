<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monthlyfoods extends Model
{
    use HasFactory;
    public $fillable = [
        'amount',  'date', 'month','year','users_id','dollar_rate','total_market'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
   
}
