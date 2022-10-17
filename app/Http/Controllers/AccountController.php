<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AccountController extends Controller
{
    public function editProfile(Request $request)
    {
        $user = $request->user();
        $divisions = Division::all();

        return view('editProfile', compact('user', 'divisions'));
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();
        $user->name = $request->get('name');
        $user->nim = $request->get('nim');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->division_id = $request->get('division');
        $user->reference_source = $request->get('reference_source');
        $user->program_study = $request->get('program_study');
        $user->address = $request->get('address');
        $user->save();

        return redirect()->route('wizard.summary');
    }

    public function changePassword(Request $request)
    {
        return view('changePassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Password lama salah!");
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with("status", "Password sukses dirubah!");
        // return redirect()->route('wizard.summary');
        // event(new PasswordReset($user));

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        // $status = Password::reset(
        //     // $request->only('password', 'password_confirmation'),
        //     // function ($user) use ($request) {
        //     //     $user->forceFill([
        //     //         'password' => Hash::make($request->password),
        //     //     ])->save();

        //     }
        // );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        // return $status == Password::PASSWORD_RESET
        //     ? redirect()->route('login')->with('status', __($status))
        //     : back()->withInput($request->only('email'))
        //     ->withErrors(['email' => __($status)]);
    }
}
