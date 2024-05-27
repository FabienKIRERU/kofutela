<?php

namespace App\Http\Controllers\Owner;


use App\Models\Area;
use App\Models\Option;
use App\Models\Picture;
use App\Models\Quarter;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Owner\PropertyFormRequest;

class PropertyController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Property::class, 'property');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('owner.properties.index',[
            'properties' => Property::orderBy('created_at', 'desc')->where('user_id', auth()->user()->id)->paginate(25),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        $property->fill([
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 1,
            'floor' => 0,
            'city' => 'Lubumbashi',
            'postal_code' => 7140,
            'sold' => false,
        ]);
        return view('owner.properties.form', [
            'property' => $property,
            'options' => Option::where('user_id', auth()->user()->id)->pluck('name', 'id'),
            'quarters' => Quarter::select('id', 'name', 'area_id')->with('area')->get(),
            'areas' => Area::get(),
            'categories' => Category::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $property = new Property();
            $property->title = $request['title'];
            $property->user_id = auth()->user()->id;
            $property->quarter_id = $request['quarter_id'];
            $property->category_id = $request['category_id'];

            $property->description = $request['description'];
            $property->surface = $request['surface'];
            $property->rooms = $request['rooms'];
            $property->bedrooms = $request['bedrooms'];
            $property->floor = $request['floor'];
            $property->price = $request['price'];
            $property->garanteed = $request['garanteed'];
            $property->address = $request['address'];
            $property->sold = $request['sold'];
            
        $property->save();
        $property->options()->sync($request->validated('options'));
        if($request->validated('pictures')){
            $property->attachFiles($request->validated('pictures'));
        }
        $property->notifyFollowers();
        return to_route('owner.property.index')->with('success','Le bien a été bien créé');
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
        return view('owner.properties.form',[
            'property' => $property,
            'quarters' => Quarter::select('id', 'name', 'area_id')->orderBy('name')->get(),
            'categories' => Category::get(),
            'options' => Option::where('user_id', auth()->user()->id)->pluck('name', 'id'),
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
        $property->garanteed = $request['garanteed'];
        $property->address = $request['address'];
        $property->sold = $request['sold'];
        $property->save();
        $property->options()->sync($request->validated('options'));
        if($request->validated('pictures')){
            $property->attachFiles($request->validated('pictures'));
        }
        return to_route('owner.property.index')->with('success','Le bien a été bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        Picture::destroy($property->pictures()->pluck('id'));
        // $property->delete();
        return to_route('owner.property.index')->with('success','Le bien a été supprimé');
    }
}

