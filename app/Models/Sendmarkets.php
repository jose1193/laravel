<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sendmarkets extends Model
{
    use HasFactory;
    protected $fillable = [
        'email','date','users_id','idmonthlymarket'
   ];
   public function monthlyfood()
   {
       return $this->belongsTo(Monthlyfoods::class);
   }
}
