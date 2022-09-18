<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MontBudgets extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    public $fillable = [
        'unitquantity', 'price', 'total', 'dollar', 'date', 
    ];
}
