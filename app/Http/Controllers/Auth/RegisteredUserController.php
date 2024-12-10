<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
         $request->validate([
             'first_name' => 'required|string|max:255',
             'last_name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:'.User::class,
             'password' => ['required', 'confirmed'],
         ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username'  => $request->email,
            'is_superuser' => false,
            'is_staff' => false,
            'date_joined'=> date('Y-m-d h:m:s'),
            'photo' => 'gg',
            'is_active' => true,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('personal');
    }

    public function destroy(){
        $user = User::find(auth()->user()->id);
        if ($user) {
            $user->delete();
        }
        return redirect()->route('home');
    }
}
