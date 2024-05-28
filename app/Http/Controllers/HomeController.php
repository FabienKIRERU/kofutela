<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $properties = Property::available()->recent()->limit(4)->get();
        // $properties = Property::with('pictures')->available()->recent()->limit(4)->get();

        return view('home', 
        [
            'properties' => $properties,
        ]);
    }
}
