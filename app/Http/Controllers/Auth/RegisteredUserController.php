<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use App\Notifications\RegisterNotification;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $today = Carbon::today()->toDateString();
        $now = Carbon::now()->toTimeString();
        $setting = Setting::first();
        $inOperational = false;
        $inPeriod = false;

        if ($today >= $setting->date_start && $today <= $setting->date_end) {
            $inPeriod = true;
        }

        if ($now >= $setting->opening_hours && $now <= $setting->closing_hours) {
            $inOperational = true;
        }

        if ($inPeriod == true && $inOperational == true) {
            return view('auth.register');
        }

        return view('closed', compact('inPeriod', 'inOperational'));
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
            'nim' => ['required', 'string', 'max:10', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $initialRegNum = Setting::first()->initial_registration_number;
        $currentRegNum = User::max('registration_number');

        if ($currentRegNum == 0) {
            $registrationNumber = $initialRegNum;
        } else {
            $registrationNumber = $currentRegNum + 1;
        }

        $user = User::create([
            'registration_number' => $registrationNumber,
            'nim' => $request->nim,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        if ($user->payment == null) {
            $user->payment()->create([
                'payment_due' => Carbon::now()->addDays(3)
            ]);
        }

        event(new Registered($user));

        $user->notify(new RegisterNotification($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
