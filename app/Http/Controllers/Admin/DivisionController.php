<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::all();

        return view("admin.divisions.index", ['divisions' => $divisions]);
    }

    public function create()
    {
        return view("admin.divisions.create");
    }

    public function store(Request $request)
    {
        // Validator::make($request->all(), [
        //     "location" => "required|min:3|max:100",
        // ])->validate();

        $data = new Division();
        $data->name = $request->get('name');
        $data->save();

        return redirect()->route('admin.divisions.index');
    }

    // public function show($id)
    // {
    //     //
    // }

    public function edit($id)
    {
        $division = Division::findOrFail($id);

        return view("admin.divisions.edit", ['division' => $division]);
    }

    public function update(Request $request, $id)
    {
        // Validator::make($request->all(), [
        //     "location" => "required|min:3|max:100",
        // ])->validate();

        $data = Division::findOrFail($id);
        $data->name = $request->get('name');
        $data->save();

        return redirect()->route('admin.divisions.index');
    }

    public function destroy($id)
    {
        $data = Division::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.divisions.index');
    }
}
