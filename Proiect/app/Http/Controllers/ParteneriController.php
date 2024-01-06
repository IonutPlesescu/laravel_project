<?php

namespace App\Http\Controllers;

use App\Models\Parteneri;
use Illuminate\Http\Request;

class ParteneriController extends Controller
{
    
    
    public function index()
    {
        $parteneri = Parteneri::all();
        return view('parteneri.index', compact('parteneri'));
    }
    
    public function create()
    {
        return view('parteneri.create');
    }
    
    public function store(Request $request)
    {
        Parteneri::create($request->all());
        return redirect()->route('parteneri.index');
    }
    
    public function show($id)
{
    $partener = Parteneri::find($id);
    return view('parteneri.show', compact('partener'));
}

    
public function edit(Parteneri $parteneri)
{
    return view('parteneri.edit', compact('parteneri'));
}


    
    public function update(Request $request, Parteneri $parteneri)
    {
        $parteneri->update($request->all());
        return redirect()->route('parteneri.index');
    }
    
    public function destroy(Parteneri $parteneri)
    {
        $parteneri->delete();
        return redirect()->route('parteneri.index');
    }
    
}
