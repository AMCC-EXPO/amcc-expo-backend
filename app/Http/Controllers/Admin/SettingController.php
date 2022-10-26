<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::firstOrCreate();

        return view("admin.settings.index", ['setting' => $setting]);
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);

        $setting->announcement = $request->get('announcement');
        $setting->initial_registration_number = $request->get('initial_registration_number');
        $setting->price = $request->get('price');
        $setting->date_start = $request->get('date_start');
        $setting->date_end = $request->get('date_end');
        $setting->opening_hours = $request->get('opening_hours');
        $setting->closing_hours = $request->get('closing_hours');
        $setting->payment_is_open = $request->get('payment_state');
        $setting->cs_number = $request->get('cs_number');
        $setting->link_group = $request->get('link_group');
        $setting->save();

        return redirect()->route('admin.settings.index');
    }
}
