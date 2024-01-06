<?php

namespace App\Http\Controllers;

use App\Models\Bilet;

use Illuminate\Http\Request;

class BileteController extends Controller
{
    public function index()
    {
        $bilete = Bilet::all();
        return view('bilete.index', compact('bilete'));
    }

    public function create()
    {
        return view('bilete.create');
    }

    public function store(Request $request)
    {
        Bilet::create($request->all());
        return redirect()->route('bilete.index');
    }

    public function show($id)
    {
        $bilet = Bilet::find($id);
        return view('bilete.show', compact('bilet'));
    }

    public function edit(Bilet $bilet)
    {
        return view('bilete.edit', compact('bilet'));
    }
    

    public function update(Request $request, Bilet $bilet)
{
    
    
    $bilet->update($request->all());



    return redirect()->route('bilete.index');
}
public function destroy(Bilet $bilet)
{
    
    $bilet->delete();
    return redirect()->route('bilete.index');
}

}
