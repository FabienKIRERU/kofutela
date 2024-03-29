<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        return view('owner.dashboard', [
            'properties' => Property::with('pictures')->where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
