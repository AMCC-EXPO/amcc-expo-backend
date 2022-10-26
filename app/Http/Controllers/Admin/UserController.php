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
        $users = User::paginate(30);

        $noreg = $request->get('noreg');
        $nim = $request->get('nim');
        $name = $request->get('nama');

        if ($request) {
            $users = User::when($noreg, function ($query, $noreg) {
                $query->where(
                    'registration_number',
                    'LIKE',
                    "%$noreg%"
                );
            })->when($nim, function ($query, $nim) {
                $query->where(
                    'nim',
                    'LIKE',
                    "%$nim%"
                );
            })->when($name, function ($query, $name) {
                $query->where(
                    'name',
                    'LIKE',
                    "%$name%"
                );
            })->paginate(50);
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

    public function chat(Request $request){
        $users = User::with('payment')
                    ->whereRelation('payment', 'status', '=', 'unpaid')->get();

        foreach($users as $user){
            $messages[] = [
                "message"=> "Hallo $user->name ✨ \n\nMenindak lanjuti dari proses pendaftaran member AMCC, izin memberi info nihh kalau batas pembayaran member AMCC *diperpanjang* sampai tanggal *26 Oktober 2022, pukul 23.59  (Malam ini)*. Mohon diperhatikan dengan seksama karena setelah ditutup sudah *tidak akan ada perpanjangan pembayaran lagi*. \n\nBagi teman-teman yang belum sempat melakukan pembayaran masih ada kesempatan nih untuk menyelesaikan proses pendaftaran member AMCC 🚀 \n\nBagi yang belum mengupload bukti pembayaran silahkan segera menguploadnya melalui website ya 🙌🏻\n\nLoginnya gimana kak? Bisa buka link ini ya mentemen \nhttps://join.amcc.or.id/login \n\nBagi temen-temen yang mengalami kendala terkait proses pembayaran bisa segera menghubungi WA CS EXPO AMCC\n\nJangan di sia-siakan ya teman-teman kesempatan untuk join dengan AMCC, karena AMCC hanya buka pendaftaran sekali selama EXPO. Kami harap teman-teman tidak melewatkan kesempatan ini karena akan banyak sekali benefit yang temen-temen dapatkan di AMCC 🥰\n\nTerima kasih, semangat selalu temen-temen ✨🤗",
                "phone_number"=> "62". ltrim($user->phone, '0'),
                "message_type"=> "text"
            ];
        }

        $data = [
            "messages" => $messages,
            "device_id" => "cs-expo"
        ];

        return response()->json($data);
    }
}
