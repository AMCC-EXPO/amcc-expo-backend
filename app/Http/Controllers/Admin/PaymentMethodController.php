<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::all();

        return view("admin.payment_methods.index", ['paymentMethods' => $paymentMethods]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    // public function show($id)
    // {
    //     //
    // }

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
        //
    }
}
