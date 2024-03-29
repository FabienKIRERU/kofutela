<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\OwnerFormRequest;

class OwnerController extends Controller
{
    public function owner(){
        return view('owner.register');
    }
    public function beOwner(OwnerFormRequest $request){

        // $user = User::create($request->validated());
        $user = new User();

        $user->name= $request['name'];
        $user->username= $request['username'];
        $user->email= $request['email'];
        $user->phone= $request['phone'];
        $user->password= Hash::make($request['password']);

        // $user->role = 'onwer';
        $user->save();

        return to_route('login')->with('success', 'vous ête bien connectés');
    }
}
