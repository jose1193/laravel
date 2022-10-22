<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyfoods extends Model
{
    use HasFactory;
    protected $fillable = [
        'unitquantity', 'price', 'total', 'dollar', 'date', 'idbudgetfood','description',
    ];

    public function Mbudgetfoods()
    {
        return $this->belongsTo('App\Models\Monthlyfoods');

    }

    public function usersfoods()
    {
        return $this->belongsTo(User::class);
    }

}
