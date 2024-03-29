<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\User;
use App\Models\Option;
use App\Models\Picture;
use App\Models\Quarter;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Owner\PropertyFormRequest;
use App\Http\Requests\Admin\SearchPropertyRequest;

class PropertyController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Property::class, 'property');
    }
    /**
     * Display a listing of the resource.
     */
    
     public function index(SearchPropertyRequest $request){

        $username = $request->input('user');
        $query = Property::query()->with(['quarter', 'user'])->orderBy('updated_at', 'desc');
        // dd($query);
        $queryArea = Area::query();
        if ($request->validated('price')) {
            $query = $query->where('price', '>=', $request->input('price'));
        }
        if ($request->validated('category')) {
            $query = $query->where('category_id', $request->input('category'));
        }
        if($request->validated('area_id')){
            $query->whereHas('quarter', function ($query) use ($request){
                $query->where('area_id', $request->validated('area_id'));
            });
        }
        // if ($request->validated('user')) {
        //     Property::whereHas('user_', function ($query) use ($username) {
        //         $query->where('username', 'like', "%{$username}%");
        //     } );
        // }
        if ($request->validated('title')) {
            $query = $query->where('title', 'like', "%{$request->input('title')}%");
        }

        return view('admin.properties.index', [
            'properties' => $query->paginate(16),
            'quarters' => Quarter::with('area')->get(),
            'areas' => Area::select('id', 'name')->with('quarters')->get(),
            'categories' => Category::select('id', 'titre')->get(),
            'input' => $request->validated(),
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form',[
            'property' => $property,
            'quarters' => Quarter::select('id', 'name', 'area_id')->with('area')->get(),
            'categories' => Category::get(),
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->title = $request['title'];
        $property->quarter_id = $request['quarter_id'];
        $property->category_id = $request['category_id'];
        $property->description = $request['description'];
        $property->surface = $request['surface'];
        $property->rooms = $request['rooms'];
        $property->bedrooms = $request['bedrooms'];
        $property->floor = $request['floor'];
        $property->price = $request['price'];
        $property->address = $request['address'];
        $property->sold = $request['sold'];
        $property->save();
        $property->options()->sync($request->validated('options'));
        if($request->validated('pictures')){
            $property->attachFiles($request->validated('pictures'));
        }
        return to_route('admin.property.index')->with('success','Le bien a été bien modifié');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        Picture::destroy($property->pictures()->pluck('id'));
        $property->delete();
        return to_route('admin.property.index')->with('success','Le bien a été supprimé');
    }
    
}
