<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AreaFormRequest;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    
    public function __construct() {
        $this->authorizeResource(Area::class, 'area');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.areas.index',[
            'areas' => Area::paginate(25),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $area = new Area();
        $area->fill([
            'name' => '',
        ]);
        return view('admin.areas.form', [
            'area' => $area,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AreaFormRequest $request)
    {
        $area = Area::create($request->validated());
        return to_route('admin.area.index')->with('success','La commune a été bien créé');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        return view('admin.areas.form',[
            'area' => $area,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AreaFormRequest $request, Area $area)
    {
        $area->update($request->validated());
        return to_route('admin.area.index')->with('success','La commune a été bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
    {
        $area->delete();
        return to_route('admin.area.index')->with('success','La commune a été supprimé');
    }
}
