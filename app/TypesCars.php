<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypesCars extends Model
{
    protected $table="types_cars";
    protected $fillable=['name_ar','name_en'];
    public function car()
    {
        return $this->belongsTo('App\Car');
    }
}
