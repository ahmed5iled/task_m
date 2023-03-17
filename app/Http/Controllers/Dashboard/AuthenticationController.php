<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\LoginRequest;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class AuthenticationController
 * @package App\Http\Controllers\Dashboard
 */
class AuthenticationController extends Controller
{
    /**
     * AuthenticationController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'show');
        $this->middleware('auth')->only('logout', 'show');
    }

    /**
     * Handel The Request For Return Home Page
     * @return View
     */
    public function index(): View
    {
        return view('dashboard.login');
    }

    public function show()
    {
        return view('dashboard.index');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->intended(route('dashboard.index'));
        }

        return redirect()->back()->withErrors(['credentials' => 'Invalid email or password!']);
    }


    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('dashboard.auth.index');
    }
}
