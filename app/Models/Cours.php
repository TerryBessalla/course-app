<?php

namespace App\Models;

use App\Models\User;
use App\Models\Episode;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Policies\CoursPolicy;



class Cours extends Model
{
    use HasFactory;
    protected  $fillable=['title','description'];
    protected  $appends=['update'];
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

    public function getUpdateAttribute() {
        return CoursPolicy::update(auth()->user(),$this);

    }
}
