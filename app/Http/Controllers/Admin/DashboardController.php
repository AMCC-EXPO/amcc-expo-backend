<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        /*
         * Uncomment the line below if you want to use verified middleware
         */
        //$this->middleware('verified:admin.verification.notice');
    }


    public function index()
    {
        $today = Carbon::today();

        $all = [
            'todayUser' => User::whereDate('created_at', $today)->count(),
            'todayIncome' => Payment::whereDate('created_at', $today)->sum('amount'),
            'totalUser' => User::count(),
            'totalIncome' => Payment::sum('amount'),
        ];

        $user = [
            'unpaid' => User::with('payment')->whereRelation('payment', 'status', 'unpaid')->count(),
            'review' => User::with('payment')->whereRelation('payment', 'status', 'review')->count(),
            'paid' => User::with('payment')->whereRelation('payment', 'status', 'paid')->count(),
        ];

        $income = Payment::where('status', 'paid')->sum('amount');

        return view('admin.dashboard', compact('all', 'user', 'income'));
    }

    public function report()
    {
        $users = User::with('payment')->whereRelation('payment', 'status', 'paid')->count();

        $income = Payment::where('status', 'paid')->sum('amount');

        $paymentMethods = PaymentMethod::all();

        foreach ($paymentMethods as $paymentMethod) {
            $totalAmount[$paymentMethod->id] = Payment::where('payment_method_id', $paymentMethod->id)->where('status', 'paid')->sum('amount');
        }

        return view('admin.report', compact('users', 'income', 'paymentMethods', 'totalAmount'));
    }
}
