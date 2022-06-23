<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['title','slug','body','image','user_id'];
    public function getRouteKeyName()
    {
        return 'slug';
    }

     public function user(){
         return $this->belongsTo(User::class);
     }
}
