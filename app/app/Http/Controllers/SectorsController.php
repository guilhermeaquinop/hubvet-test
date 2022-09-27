<?php

namespace App\Http\Controllers;

use App\Models\Sectors;
use Illuminate\Http\Request;

class SectorsController extends Controller
{
    public function create()
    {
        return view ('layouts.sectors');
    }

    public function store(Request $request)
    {
        $sectors = new Sectors();

        $sectors->name = $request->name;

        $user = auth()->user();
        
        $sectors->id_market = $user->id;

        $sectors->save(); 

        return redirect('/sectors')->with('successfulRegistration', 'Registration successful!');
    }

    public function show()
    {
        $sectors = Sectors::all();
        return view('layouts.sectors', compact('sectors'));
    }

    public function edit($id) 
    {
        $sector = Sectors::findOrFail($id);
        return view('layouts.sectors_edit', compact('sector'));
    }

    public function update(Request $request) 
    {
        $sector = $request->all();
        Sectors::findOrFail($request->id)->update($sector);
        return redirect('/sectors')->with('successfulRegistration', 'Update successful!');
    }

    public function destroy($id)
    {
        Sectors::findOrFail($id)->delete();
        return redirect('/sectors')->with('successfulDelete', 'Record deleted!');
    }
}
