<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musician;

class MusicianController extends Controller
{
    public function register_musician(Request $request)
    {
        $musician = Musician::create([
            // 'user_id'
            'instrument' => $request->instrument,
            'like' => $request->like,

         ]);
       

        return redirect()->route('musicians.index')->with('success', 'Musician created succesfully');
    }

    public function show_musician($id)
    {
        $musician_name = Musician::find($id);
        return view('musicians.show',compact('musician_name'));
    }


}
