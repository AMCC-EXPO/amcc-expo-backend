<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
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

        $pending = [
            'todayUser' => Payment::whereDate('created_at', $today)->where('status', 'review')->count(),
            'todayIncome' => Payment::whereDate('created_at', $today)->where('status', 'review')->sum('amount'),
            'totalUser' => Payment::where('status', 'review')->count(),
            'totalIncome' => Payment::where('status', 'review')->sum('amount'),
        ];

        $success = [
            'todayUser' => Payment::whereDate('created_at', $today)->where('status', 'paid')->count(),
            'todayIncome' => Payment::whereDate('created_at', $today)->where('status', 'paid')->sum('amount'),
            'totalUser' => Payment::where('status', 'paid')->count(),
            'totalIncome' => Payment::where('status', 'paid')->sum('amount'),
        ];

        return view('admin.dashboard', compact('all', 'pending', 'success'));
    }
}
