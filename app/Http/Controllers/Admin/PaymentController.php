<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;

class PaymentController extends Controller
{
    public function review(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $payment = $user->payment;

        return view('admin.users.review', compact('user', 'payment'));
    }

    public function approve(Request $request, $id)
    {
        $payment = User::findOrFail($id)->payment;
        $payment->status = 'paid';
        $payment->save();

        // TODO
        // EMAIL WELCOME

        return redirect()->route('admin.members.index');
    }
}
