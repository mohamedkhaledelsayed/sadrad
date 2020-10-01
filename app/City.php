<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table= "cities";
    protected $fillable= ['id','gov_id','city_name'];
    public function Governorates()
    {
        return $this->hasMany('App\Governoratment','id','gov_id');
    }
}
