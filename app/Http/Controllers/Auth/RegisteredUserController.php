<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Teacher; // ✅
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    // public function create(): View
    // {
    //     return view('auth.register');
    // }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
             'role' => ['required', 'in:student,teacher'], //  only allow these
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
             'role' => $request->role, //  role comes from dropdown
            'password' => Hash::make($request->password),
        ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    event(new Registered($user));
    Auth::login($user);

    // return redirect('/dashboard');

    return back();


 // Redirect based on role
        return $this->redirectBasedOnRole($user);
    }

    /**
     * Redirect user based on their role
     */
    private function redirectBasedOnRole(User $user): RedirectResponse
    {
        return match($user->role) {
            'teacher' => redirect()->route('teacher.dashboard'),
            'student' => redirect()->route('student.dashboard'),
            default => redirect('/dashboard'),
        };
    }
}
