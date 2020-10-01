<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table ='cars';
    protected $fillable =['brand_car','model','maximum_weight','number_of_persons','Aircondtion'];
    public function typesCars()
    {
        return $this->hasMany('App\TypesCars','id','type_carid');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
