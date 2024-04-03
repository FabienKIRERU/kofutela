<?php

namespace App\Http\Controllers\Admin;

use App\Models\Followers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FollowerEditRequest;
use App\Http\Requests\Admin\FormEditRequest;
use App\Http\Requests\FollowersRequest;

class FollowersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.followers.index',[
            'followers' => Followers::paginate(25),
        ]);
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Followers $follower)
    {
        return view('admin.followers.form', [
            'follower' => $follower,
        ]);
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(FollowerEditRequest $request, Followers $follower)
    {
        $follower->update($request->validated());
        return view('admin.followers.index', [
            'followers' => Followers::paginate(25)
        ])->with('success', 'vous avez modifié un follower');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Followers $follower)
    {
        $follower->delete();
        return to_route('admin.follower.index')->with('success', 'vous avez desabonné un follower');
    }
}
