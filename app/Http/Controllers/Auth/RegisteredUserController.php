<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\StripeController;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Stripe\Checkout\Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }


    

    public static function new_register()
    {
        $dataToPass = request()->getQueryString();
        parse_str($dataToPass, $request);

        // Generate a random password
         $randomPassword = $request['name'];

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'whatsapp_number' => $request['whatsapp_number'],
            'password' => Hash::make($randomPassword), // Use the generated password
        ]);

        Auth::login($user);
        $user = Auth::user();
        session(['user' => $user]);
       // Mail::to($user->email)->send(new RegistrationSuccessfulEmail($user));

        return view('steptwo');
    }



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
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
