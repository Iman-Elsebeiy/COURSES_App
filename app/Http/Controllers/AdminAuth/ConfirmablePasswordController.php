<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    public function show(): View
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
    //     if (! Auth::guard('web')->validate([
    //         'email' => $request->user()->email,
    //         'password' => $request->password,
    //     ])) {
    //         throw ValidationException::withMessages([
    //             'password' => __('auth.password'),
    //         ]);
    //     }

    //     $request->session()->put('auth.password_confirmed_at', time());

    //     return redirect()->intended(route('dashboard', absolute: false));
    // }
       // بيتأكد إن الباسورد صح للـ admin
    if (! Auth::guard('admin')->validate([
        'email' => $request->user('admin')->email,
        'password' => $request->input('password'),
    ])) {
        return back()->withErrors([
            'password' => __('The provided password does not match our records.'),
        ]);
    }

    // هنا أهم حاجة 👇
    // بيخزن في السيشن إن الادمن أكد الباسورد بتاعه
    $request->session()->put('auth.password_confirmed_at_admin', time());

    // بعد ما ينجح يرجعه على الصفحة اللي كان رايح لها
    return redirect()->intended(route('admin.dashboard'));
}
}