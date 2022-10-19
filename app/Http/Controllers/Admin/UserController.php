<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // $users = User::all()->sortDesc();

        // return view("admin.users.index", ['users' => $users]);

        if (request()->ajax()) {
            $users = User::query();
            return DataTables::of($users)
                ->make();
        }

        // if ($request->ajax()) {
        //     $model = User::with('payment');
        //         return DataTables::eloquent($model)
        //         ->addColumn('payment', function (User $user) {
        //             return $user->payment->paymentMethod->name;
        //         })
        //         ->toJson();
        // }

        return view('admin.users.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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

        return redirect()->route('admin.members.index');
    }
}
