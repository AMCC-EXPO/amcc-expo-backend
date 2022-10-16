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
        return view('admin.payment_methods.create');
    }

    public function store(Request $request)
    {
        $data = new PaymentMethod();
        $data->name = $request->get('name');
        $data->receiver_name = $request->get('receiver_name');
        $data->receiver_number = $request->get('receiver_number');
        $data->fee = $request->get('fee');
        $data->is_ots = $request->get('is_ots');
        $data->is_active = $request->get('is_active');

        if ($request->hasFile('icon')) {
            $data->addMediaFromRequest('icon')->toMediaCollection('payment-icon');
        }

        $data->save();

        return redirect()->route('admin.payment-methods.index');
    }

    // public function show($id)
    // {
    //     //
    // }

    public function edit($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);

        return view("admin.payment_methods.edit", ['paymentMethod' => $paymentMethod]);
    }

    public function update(Request $request, $id)
    {
        $data = PaymentMethod::findOrFail($id);
        $data->name = $request->get('name');
        $data->receiver_name = $request->get('receiver_name');
        $data->receiver_number = $request->get('receiver_number');
        $data->fee = $request->get('fee');
        $data->is_ots = $request->get('is_ots');
        $data->is_active = $request->get('is_active');
        $data->save();

        if ($request->hasFile('icon')) {
            $data->media()->delete();
            $data->addMediaFromRequest('icon')->toMediaCollection('payment-icon');
        }

        return redirect()->route('admin.payment-methods.index');
    }

    public function destroy($id)
    {
        $data = PaymentMethod::findOrFail($id);
        // $data->media()->delete();
        $data->clearMediaCollection('payment-icon');
        $data->delete();

        return redirect()->route('admin.payment-methods.index');
    }
}
