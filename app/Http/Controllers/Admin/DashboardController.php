<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Property;
use App\Models\Quarter;

class DashboardController extends Controller
{
    public function index(){
        // $ownerUsersCount = User::where('role', 'owner')->count();
        return view('admin.dashboard', [
            'ownerCount' => User::where('role', 'owner')->count(),
            'PropertyCount' => Property::count(),
            'MoyenPropertyPerOwner' => Property::count() / User::where('role', 'owner')->count(),
            'quartersRanking' => Quarter::withCount('properties')->orderBy('properties_count', 'desc')->get(),
            // 'areasRanking' => Area::withCount('quarters.properties')->orderBy('quarters_properties_count', 'desc')->get(),
            'usersRanking' => User::where('role', 'owner')->withCount('properties')->orderBy('properties_count', 'desc')->get(),
        ]);
    }
}
