<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Businesses extends Model
{
    use HasFactory;
    protected $fillable = [
        'businessname', 'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
