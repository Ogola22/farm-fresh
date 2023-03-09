<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cropController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $crops = \App\Models\crops::all();
        return view('category.crop.index', compact('crops'));
    }

    public function create()
    {
        return view('category.crop.create');
    }


    // store new crop

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'crop_duration' => 'required',
            'farmers_note' => 'required',
        ]);

        $crop = new \App\Models\crops;
        $crop->user_id = auth()->user()->id;
        $crop->name = $request->name;
        $crop->crop_duration = $request->crop_duration;
        $crop->farmers_note = $request->farmers_note;
        $crop->save();

        return redirect()->route('crop.index');
    }
     // edit crop data

     public function edit($id)
     {
         $crop = \App\Models\crops::findorFail($id);

         return view('category.crop.edit', ['crop'=>$crop]);
     }

     //update crop record

     public function update(Request $request, $id)
     {
         $crop = \App\Models\crops::findorFail($id);
         $request->validate([
             'name' => ['required','min:2','max:100'],
             'quantity' => ['required','min:1','max:100'],
             'farmers_note' => ['required','min:2','max:255']
         ]);

         $crop->user_id = auth()->user()->id;
         $crop->name = $request->name;
         $crop->quantity = $request->quantity;
         $crop->farmers_note = $request->farmers_note;

         $crop->update();

         return redirect()->route('crop.index')->with('updateMsg', 'Record successfully Updated');
     }

     //delete crop data

     public function destroy($id)
     {
         $crop = \App\Models\crops::findorFail($id);
         $crop->delete();
         return redirect()->route('crop.index')->with('delMsg', 'crop record deleted!');
     }
}
