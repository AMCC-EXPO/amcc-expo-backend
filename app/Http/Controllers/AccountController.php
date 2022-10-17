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
    }

    public function resetPassword(Request $request, $id)
    {
        User::whereId($id)->update([
            'password' => Hash::make("amccamikom")
        ]);

        return redirect()->route('admin.members.index');
    }
}
