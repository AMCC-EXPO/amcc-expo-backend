<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();

        return view("admin.faqs.index", ['faqs' => $faqs]);
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $data = new Faq();
        $data->question = $request->get('question');
        $data->answer = $request->get('answer');
        $data->is_publish = $request->get('is_publish');
        $data->save();

        return redirect()->route('admin.faqs.index');
    }

    // public function show($id)
    // {
    //     //
    // }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);

        return view("admin.faqs.edit", ['faq' => $faq]);
    }

    public function update(Request $request, $id)
    {
        $data = Faq::findOrFail($id);
        $data->question = $request->get('question');
        $data->answer = $request->get('answer');
        $data->is_publish = $request->get('is_publish');
        $data->save();

        return redirect()->route('admin.faqs.index');
    }

    public function destroy($id)
    {
        $data = Faq::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.faqs.index');
    }
}
