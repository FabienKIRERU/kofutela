<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Followers;
use Illuminate\Http\Request;
use App\Http\Requests\FollowersRequest;

class FollowersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $follower = new Followers();
        return view('followers.form', [
            'follower' => $follower,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FollowersRequest $request)
    {
        $follower = Followers::create($request->validated());
        return view('followers.form', [
            'follower' => new Followers()
            ])->with('success', 'vous ête bien modifié');
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
    public function edit(Followers $follower)
    {
        return view('follower.form', [
            'followers' => $follower,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FollowersRequest $request, Followers $follower)
    {
        $follower->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Followers $follower)
    {
        $follower->delete();
        return to_route('admin.follower.index')->with('success', 'vous n\'êtes plus followers');
    }
}
