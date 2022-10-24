<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\RegisterNotification;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // $users = User::all()->sortDesc();
        $users = User::paginate(30);

        $filterKeyword = $request->get('keyword');
        $status = $request->get('status');

        if ($filterKeyword) {
            $users = \App\Models\User::where(
                'registration_number',
                'LIKE',
                "%$filterKeyword%"
            )
            ->paginate(50);
        }

        return view("admin.users.index", compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => ['required', 'string', 'max:10', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20', 'unique:users'],
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
            'password' => Hash::make('amccamikom'),
        ]);

        if ($user->payment == null) {
            $user->payment()->create([
                'payment_due' => Carbon::now()->addDays(1)
            ]);
        }

        if ($request->send_email == true) {
            $user->notify(new RegisterNotification($user));
        }

        event(new Registered($user));

        return redirect()->route('admin.members.create')->with('status', 'Sukses menambahkan member!')->with('user', $user);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->payment->delete();
        $data->delete();

        return redirect()->route('admin.members.index')->with('status', 'Sukses menghapus member!');
    }
}
