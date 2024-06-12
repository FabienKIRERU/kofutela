<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Cookie;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        
        $user = auth()->user();

        switch ($user) {
            case $user->role == "admin": 
                return redirect()->intended(RouteServiceProvider::HOME);
                break;
            
            case $user->role == "owner": 
                return redirect()->intended(RouteServiceProvider::HOME_OWNER);
                break;
                        
            default:
                return redirect('/');
                break;
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $response = new Response('logged out');
        $response->withCookie(Cookie::forget('laravel_session'));

        return redirect('/');
    }
}
