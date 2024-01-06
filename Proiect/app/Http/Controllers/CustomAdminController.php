<?php

namespace App\Http\Controllers;

use App\Models\CustomAdmin; // Make sure to use the correct namespace for your CustomAdmin model
use Illuminate\Http\Request;

class CustomAdminController extends Controller
{
    public function index()
    {
        // Retrieve all CustomAdmins from the database
        $customAdmins = CustomAdmin::all();

        // Return the view with the data
        return view('custom_admin.index', compact('customAdmins'));
    }

    public function create()
    {
        // Return the view for creating a new CustomAdmin
        return view('custom_admin.create');
    }

    public function store(Request $request)
    {
        // Validate and store the new CustomAdmin in the database
        // Customize this part based on your form fields
        $data = $request->validate([
            'username' => 'required',
            'parola' => 'required',
            'email' => 'required|email',
            'numar_de_telefon' => 'required',
        ]);

        CustomAdmin::create($data);

        // Redirect to the index page or any other page you prefer
        return redirect()->route('custom_admins.index')->with('success', 'CustomAdmin created successfully!');
    }

    public function show($id)
    {
        // Retrieve and show the details of a specific CustomAdmin
        $customAdmin = CustomAdmin::findOrFail($id);

        return view('custom_admin.show', compact('customAdmin'));
    }

    public function edit($id)
    {
        // Retrieve and show the form for editing a specific CustomAdmin
        $customAdmin = CustomAdmin::findOrFail($id);

        return view('custom_admin.edit', compact('customAdmin'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the CustomAdmin in the database
        // Customize this part based on your form fields
        $data = $request->validate([
            'username' => 'required',
            'parola' => 'required',
            'email' => 'required|email',
            'numar_de_telefon' => 'required',
        ]);

        $customAdmin = CustomAdmin::findOrFail($id);
        $customAdmin->update($data);

        // Redirect to the index page or any other page you prefer
        return redirect()->route('custom_admins.index')->with('success', 'CustomAdmin updated successfully!');
    }

    public function destroy($id)
    {
        // Delete a specific CustomAdmin from the database
        CustomAdmin::findOrFail($id)->delete();

        // Redirect to the index page or any other page you prefer
        return redirect()->route('custom_admins.index')->with('success', 'CustomAdmin deleted successfully!');
    }
}
