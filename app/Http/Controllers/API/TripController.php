<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TripRequest;
use App\Http\Requests\updateTripRequest;
use App\Http\Resources\TripCollection;
use App\Http\Resources\Trip as TripResource;
use App\Traits\CanUpload;
use App\Car;
use App\TypesCars;
use App\User;
use App\City;
use App\Governoratment;

class TripController extends Controller
{
    public function governorates()
    {
        $governorates = Governoratment::select('id','governorate_name_'.app()->getLocale())->get();
        return response()->json($governorates);
    }
    public function cities($id)
    {
        
        $cities = City::select('id','city_name_'.app()->getLocale())->where('gov_id',$id)->get();
        return response()->json($cities);
    }

    public function cars(){

        $cars = Car::where('id',auth()->user()->id)->get();
        return response()->json($cars);

    }
}
