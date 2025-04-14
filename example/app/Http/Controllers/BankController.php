<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banks = Bank::all();

        return view("banking.index", compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("banking.register");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "bank_name" => 'required|string|min:4',
            "bank_location" => "required|string"
        ], [
            'bank_name.required' => 'The bank name is required.',
            'bank_name.min' => 'Bank name must be at least 4 characters.',
            'bank_location.required' => 'The location is required.',
        ]);

        Bank::create($validated);

        return redirect()->route('banks.index')->with("success", "Bank added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bank = Bank::find($id);

        // If bank not found, redirect to the index or show an error
        if (!$bank) {
            return redirect()->route('banks.index')->with('error', 'Bank not found');
        }

        // Return the view with the bank data
        return view('banking.show', compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
{
    return view('banking.edit', compact('bank'));
}

// Update an existing bank
public function update(Request $request, Bank $bank)
{
    // Validate and update the bank
    $request->validate([
        'bank_name' => 'required|string|max:255',
    ]);

    $bank->update([
        'bank_name' => $request->bank_name,
    ]);

    return redirect()->route('banks.index')->with('success', 'Bank updated successfully.');
}

    /**
     * Update the specified resource in storage.
     */
    

    /**
     * Remove the specified resource from storage.
     */
     
   public function destroy(Bank $bank)
{
    $bank->delete(); // Delete the bank

    return redirect()->route('banks.index')->with('success', 'Bank deleted successfully!');
}

}
