<?php

// SponsorController.php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    // Display a listing of the sponsors.
    // SponsorController.php
public function index()
{
    $sponsors = Sponsor::all();
    return view('sponsors.index', compact('sponsors'));
}


    // Show the form for creating a new sponsor.
    public function create()
    {
        return view('sponsors.create');
    }

    // Store a newly created sponsor in the database.
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'nume' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'suma' => 'required|numeric',
            'email' => 'nullable|email|max:100',
            // Add other validation rules for your fields
        ]);

        // Handle image upload if a logo is provided
        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('logos', 'public');
            $validatedData['logo'] = $imagePath;
        }

        // Create the sponsor in the database
        Sponsor::create($validatedData);

        return redirect()->route('sponsors.index');
    }

    // Display the specified sponsor.
    public function show(Sponsor $sponsor)
    {
        return view('sponsors.show', compact('sponsor'));
    }

    // Show the form for editing the specified sponsor.
    public function edit(Sponsor $sponsor)
    {
        return view('sponsors.edit', compact('sponsor'));
    }

    // Update the specified sponsor in the database.
    public function update(Request $request, Sponsor $sponsor)
    {
        // Validate the request
        $validatedData = $request->validate([
            'nume' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'suma' => 'required|numeric',
            'email' => 'nullable|email|max:100',
            // Add other validation rules for your fields
        ]);

        // Handle image upload if a new logo is provided
        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('logos', 'public');
            $validatedData['logo'] = $imagePath;
        }

        // Update the sponsor in the database
        $sponsor->update($validatedData);

        return redirect()->route('sponsors.index');
    }

    // Remove the specified sponsor from the database.
    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();
        return redirect()->route('sponsors.index');
    }
}

