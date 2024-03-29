<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SearchOwnerRequest;
use App\Models\Property;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function index(SearchOwnerRequest $request){

        $query = User::query()->orderBy('updated_at', 'desc');
        
        if ($request->validated('name')) {
            $query = $query->where('name', 'like', "%{$request->input('name')}%");
        }
        if ($request->validated('firstname')) {
            $query = $query->where('firstname', 'like', "%{$request->input('firstname')}%");
        }
        if ($request->validated('lastname')) {
            $query = $query->where('lastname', 'like', "%{$request->input('lastname')}%");
        }
        
        if ($request->validated('username')) {
            $query = $query->where('username', 'like', "%{$request->input('username')}%");
        }
        
        return view('admin.owner.index', [
            'properties' => Property::with('user')->where('role', 'owner')->orderBy('updated_at', 'desc')->get(),
            // 'quarters' => Quarter::with('area')->get(),
            // 'areas' => Area::select('id', 'name')->with('quarters')->get(),
            // 'categories' => Category::select('id', 'titre')->get(),
            // 'input' => $request->validated(),
        ]);
        
    }
    public function showOwnerCount(){
        // $ownerUsersCount = User::where('role', 'owner')->count();
        return view('admin.dashboard', [
            'ownerUsersCount' => User::where('role', 'owner')->count(),
        ]);
    }
}
