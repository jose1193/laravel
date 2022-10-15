<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monthbudgets extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'unitquantity', 'price', 'total', 'dollar', 'date', 'idbudget','description',
    ];

    public function Mbudgets()
    {
        return $this->belongsTo('App\Models\Budgets');

    }
}
