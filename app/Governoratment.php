<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Governoratment extends Model
{
    protected $table="governorates";
    protected $fillable=['governorate_name_ar','governorate_name_en'];
    public function City()
    {
        return $this->belongsTo('App\City');
    }
}
    public function trips()
    {
        return $this->belongsTo('App\City');
    }
}
