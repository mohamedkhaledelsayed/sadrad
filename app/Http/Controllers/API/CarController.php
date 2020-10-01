<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use App\Http\Requests\updateCarRequest;
use App\Http\Resources\CarCollection;
use App\Http\Resources\Car as CarResource;
use App\Traits\CanUpload;
use App\Car;
use App\TypesCars;
use App\User;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    use CanUpload;
    public function index($local)
    {
        $cars = Car::where('language',$local)->where('user_id',Auth::user()->id)->with('typesCars:id,name_'.app()->getLocale())->get();
        return response()->json($cars);
       
    }
    public function store(CarRequest $request ,TypesCars $TypesCars)
    {
       $userID =$request->user()->id;
      
        $car = new Car();
        $car->type_carid = $TypesCars->id;
        $car->brand_car = $request->get('brand_car');
        $car->model = $request->get('model');
        $car->maximum_weight = $request->get('maximum_weight');
        $car->number_of_persons = $request->get('number_of_persons');
        $car->Aircondtion = $request->get('Aircondtion');
        $car->language = $request->get('language');
        $car->user_id = $userID;
        $car->status = 0;

        if ($request->file('image')){
            $car->image = $this->upload($request->file('image'), 'cars')->getFileName();
        }
        $car->save();
        return response()->json(['saved' => true,'data' => $car], 200);
    }
    public function update(updateCarRequest $request ,TypesCars $TypesCars ,$id)
    {
        
        $car = Car::findOrFail($id);
        $car->type_carid = $TypesCars->id;
        $car->brand_car = $request->get('brand_car');
        $car->model = $request->get('model');
        $car->maximum_weight = $request->get('maximum_weight');
        $car->number_of_persons = $request->get('number_of_persons');
        $car->Aircondtion = $request->get('Aircondtion');
        $car->language = $request->get('language');
        $car->status = $request->get('status');

        if ($request->file('image')){
            $car->image = $this->upload($request->file('image'), 'cars')->getFileName();
        }
        $car->save();
        return response()->json(['updated' => true,'data' => $car], 200);
    }

    public function destroy($id){
        
          $car = Car::findOrFail($id);
          if ($car->status == 1) {
              $massage = "This car cannot be  delete because this Car  it is reserved in trip";
              return response()->json($massage);
          }else{
            $car->delete();
            return response()->json(['deleted' => true,'data' => $car], 200);
          }
          

    }
    
}
