<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table= "trips";
    protected $fillable= [''];
    public function car()
    {
        return $this->belongsTo('App\Car');
    }
    public function city()
    {
        return $this->hasMany('App\City','id','city_id');
    }
    public function governoratment()
    {
        return $this->hasMany('App\Governoratment','id','gov_id');
    }
    
}
