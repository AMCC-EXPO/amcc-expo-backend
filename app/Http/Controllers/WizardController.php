<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Division;
use App\Models\PaymentMethod;
use App\Models\Setting;
use Illuminate\Http\Request;

class WizardController extends Controller
{

    public function profile(Request $request)
    {
        $user = $request->user();
        $divisions = Division::all();

        if ($user->wizard == 'summary') {
            return redirect()->route('wizard.summary');
        }

        return view('wizard.profile', compact('user', 'divisions'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->name = $request->get('name');
        $user->nim = $request->get('nim');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->division_id = $request->get('division');
        $user->reference_source = $request->get('reference_source');
        $user->program_study = $request->get('program_study');
        $user->address = $request->get('address');
        $user->wizard = 'payment-method';
        $user->save();

        return redirect()->route('wizard.payment-method');
    }

    public function paymentMethod(Request $request)
    {
        $user = $request->user();

        if ($user->payment->status == 'paid') {
            if ($user->wizard == 'summary') {
                return redirect()->route('wizard.summary');
            }
        }

        $paymentMethods = PaymentMethod::where('is_active', true)->get();

        $paymentState = Setting::first()->payment_is_open;

        return view('wizard.payment_method', compact('paymentMethods', 'user', 'paymentState'));
    }

    public function updatePaymentMethod(Request $request)
    {
        $payment = $request->user()->payment;
        $payment->payment_method_id = $request->paymentMethod;
        $payment->save();

        $user = $request->user();
        $user->wizard = 'payment-confirm';
        $user->save();

        return redirect()->route('wizard.payment-confirm');
    }

    public function paymentConfirm(Request $request)
    {
        if (!$request->user()->payment->status == 'unpaid') {
            if ($request->user()->wizard == 'summary') {
                return redirect()->route('wizard.summary');
            }
        }

        $paymentMethod = $request->user()->payment->paymentMethod;
        // $paymentDue = date_format($request->user()->payment->payment_due, 'd/m/Y H:i:s');
        $paymentDue = $request->user()->payment->payment_due;

        $paymentState = Setting::first()->payment_is_open;

        return view('wizard.payment_confirm', compact('paymentMethod', 'paymentDue', 'paymentState'));
    }

    public function storePaymentConfirm(Request $request)
    {
        $payment = $request->user()->payment;

        if ($request->hasFile('bukti-transfer')) {
            $payment->media()->delete();
            $payment->addMediaFromRequest('bukti-transfer')->toMediaCollection('bukti-transfer');
        }

        $payment->amount = $request->total;
        $payment->status = 'review';
        $payment->save();

        $user = $request->user();
        $user->wizard = 'summary';
        $user->save();

        return redirect()->route('wizard.summary');
    }

    public function summary(Request $request)
    {
        $user = $request->user();
        $status = $request->user()->payment->status;

        if (!$user->division_id || !$user->address || !$user->program_study || !$user->reference_source) {
            return redirect()->route('edit-profile');
        }

        if (!$user->payment->payment_method_id) {
            return redirect()->route('wizard.payment-method');
        }

        if ($user->payment->status == 'unpaid') {
            return redirect()->route('wizard.payment-confirm');
        }

        return view('wizard.summary', compact('user', 'status'));
    }
}
