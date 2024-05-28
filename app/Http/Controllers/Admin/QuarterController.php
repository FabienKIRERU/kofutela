<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quarter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuarterEditFormRequest;
use App\Http\Requests\Admin\QuarterFormRequest;
use App\Models\Area;

class QuarterController extends Controller
{
    
    public function __construct() {
        $this->authorizeResource(Quarter::class, 'quater');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.quarters.index',[
            'quarters' => Quarter::with('area')->paginate(25),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quarter = new Quarter();
        $quarter->fill([
            'name' => '',
        ]);
        return view('admin.quarters.form', [
            'quarter' => $quarter,
            'areas' => Area::all(),
            // dd( Area::all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuarterFormRequest $request)
    {
        $quarter = new Quarter();
        $data = $request->validated();

        $quarter->name = $data['name'];
        $quarter->area_id = $data['area'];        

        $quarter->save();
        return to_route('admin.quarter.index')->with('success','La commune a été bien créé');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quarter $quarter)
    {
        return view('admin.quarters.form',[
            'quarter' => $quarter,
            'areas' => Area::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuarterEditFormRequest $request, Quarter $quarter)
    {
        $quarter->update($request->validated());
        return to_route('admin.quarter.index')->with('success','La commune a été bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quarter $quarter)
    {
        $quarter->delete();
        return to_route('admin.quarter.index')->with('success','La commune a été supprimé');
    }
}
