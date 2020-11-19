<?php

namespace App\Models;

use App\Models\User;
use App\Models\Episode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cours extends Model
{
    use HasFactory;
    protected  $fillable=['title','description'];
    protected static function booted()
    {
        static::creating(function($cours){
            $cours->user_id=Auth()->id();
        } );
    }

    public function episodes(){
    	return $this->hasMany(Episode::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
