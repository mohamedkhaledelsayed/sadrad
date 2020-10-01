<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TypesCars;
class TypesCarsController extends Controller
{
    public function index()
    {
        $typescars =TypesCars::select('id','name_'.app()->getLocale())->get();
        return response()->json($typescars);
    }
}
