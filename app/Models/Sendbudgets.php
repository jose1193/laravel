<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sendbudgets extends Model
{
    use HasFactory;
    protected $fillable = [
        'idbudget', 'email','date'
    ];
}
