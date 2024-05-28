<?php

namespace App\Http\Controllers\Owner;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Owner\OptionFormRequest;
use App\Models\Property;

class OptionController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Option::class, 'option');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('owner.options.index',[
            'options' => Option::orderBy('created_at', 'desc')->where('user_id', auth()->user()->id)->paginate(25),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $option = new Option();
        $option->fill([
            'name' => 'Electricité 24h sur 24',
        ]);
        return view('owner.options.form', [
            'option' => $option,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionFormRequest $request)
    {
        $option = new Option();
        // $option = Option::create($request->validated());
            $option->name = $request['name'];
            $option->user_id =  auth()->user()->id;
            $option->save();
        return to_route('owner.option.index')->with('success','L\'option a été bien créé');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        return view('owner.options.form',[
            'option' => $option,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionFormRequest $request, Option $option)
    {
        $option->update($request->validated());
        return to_route('owner.option.index')->with('success','L\'option a été bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return to_route('owner.option.index')->with('success','L\'option a été supprimé');
    }
}
