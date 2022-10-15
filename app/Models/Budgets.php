<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budgets extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    public $fillable = [
        'amount', 'dollarchange', 'totalbudget', 'date', 'iduser', 'year','month'
    ];

    public function Bmonthbudgets()
    {
return $this->hasMany('App\Models\Monthbudgets');

    }
}
