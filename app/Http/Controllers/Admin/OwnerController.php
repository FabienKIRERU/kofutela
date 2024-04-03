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

        $query = User::query()->where('role', 'owner')->orderBy('updated_at', 'desc');
        
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
            'users' => $query->paginate(25),
            // 'quarters' => Quarter::with('area')->get(),
            // 'areas' => Area::select('id', 'name')->with('quarters')->get(),
            // 'categories' => Category::select('id', 'titre')->get(),
            'input' => $request->validated(),
        ]);
        
    }

    
    public function show(string $slug, User $user){

        $expectedSlug = $user->getSlug();
        if ($slug !== $expectedSlug) {
            return to_route('property.show', [
                'slug' => $expectedSlug,
                'user' => $user,
            ]);
        }
        return view('admin.owner.show', [
            'user' => $user,
            'properties' => Property::where('user_id', $user->id)->get(),
        ]);        
    }

    public function destroy(string $slug, User $user){
        $user->delete();
        return view('admin.owner.index')
        ->with('success', 'le propriétaire a été bien supprimé');
    }
}
