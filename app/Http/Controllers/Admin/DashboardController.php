<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\User;
use App\Models\Quarter;
use App\Models\Property;
use App\Models\Followers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        if (User::where('role', 'owner')->count() > 0) {
            $ownerCount = User::where('role', 'owner')->count();
        }
        else{
            $ownerCount = 1;
        }
        // $ownerUsersCount = User::where('role', 'owner')->count();
        return view('admin.dashboard', [
            'areaCount' => Area::count(),
            'quarterCount' => Quarter::count(),
            'ownerCount' => User::where('role', 'owner')->count(),
            'PropertyCount' => Property::count(),
            'MoyenPropertyPerOwner' => Property::count() / $ownerCount,
            'quartersRanking' => Quarter::withCount('properties')->orderBy('properties_count', 'desc')->get(),
            // 'areasRanking' => Area::withCount('quarters.properties')->orderBy('quarters_properties_count', 'desc')->get(),
            'usersRanking' => User::where('role', 'owner')->withCount('properties')->orderBy('properties_count', 'desc')->get(),
            'followersRanking' => Followers::count(),
        ]);
    }
}
