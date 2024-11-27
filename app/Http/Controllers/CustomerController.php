<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created customer in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'passport_or_jshshir' => 'required|string|max:255|unique:customers',
            'address' => 'required|string|max:255',
            'mfy' => 'required|string|max:255',
            'workplace' => 'nullable|string|max:255',
            'phone_number' => 'required|string|max:255',
            'additional_phone_number' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'jshshir' => 'nullable|string|max:255',
            'passport_given_date' => 'nullable|date',
            'date_of_birth' => 'nullable|date',
            'region' => 'nullable|string|max:255',
            'city_or_town' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload if there's a photo
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('customers', 'public');
        }

        // Create the customer record
        $customer = Customer::create([
            'full_name' => $validated['full_name'],
            'passport_or_jshshir' => $validated['passport_or_jshshir'],
            'address' => $validated['address'],
            'mfy' => $validated['mfy'],
            'workplace' => $validated['workplace'],
            'phone_number' => $validated['phone_number'],
            'additional_phone_number' => $validated['additional_phone_number'],
            'notes' => $validated['notes'],
            'jshshir' => $validated['jshshir'],
            'passport_given_date' => $validated['passport_given_date'],
            'date_of_birth' => $validated['date_of_birth'],
            'region' => $validated['region'],
            'city_or_town' => $validated['city_or_town'],
            'photo_path' => $photoPath,
        ]);

        return redirect()->route('customers.show', $customer->id)->with('success', 'Mijoz muvaffaqiyatli qo\'shildi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $agreements = $customer->agreements; // Eager load related agreements
        return view('customers.show', compact('customer', 'agreements'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified customer in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'passport_or_jshshir' => 'required|string|max:255|unique:customers,passport_or_jshshir,' . $customer->id,
            'address' => 'required|string|max:500',
            'mfy' => 'required|string|max:255',
            'workplace' => 'nullable|string|max:255',
            'phone_number' => 'required|string|max:15',
            'additional_phone_number' => 'nullable|string|max:15',
            'notes' => 'nullable|string',
            'jshshir' => 'nullable|string|max:255',
            'passport_given_date' => 'nullable|date',
            'date_of_birth' => 'nullable|date',
            'region' => 'nullable|string|max:255',
            'city_or_town' => 'nullable|string|max:255',
            'photo_path' => 'nullable|image|max:2048', // Ensure the photo is an image file
        ]);

        // Handle photo upload if exists
        if ($request->hasFile('photo_path')) {
            $photoPath = $request->file('photo_path')->store('customer_photos', 'public');

            // Optionally, delete the old photo if it exists
            if ($customer->photo_path) {
                Storage::disk('public')->delete($customer->photo_path);
            }

            $request->merge(['photo_path' => $photoPath]);
        }

        // Update the customer with the validated data
        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        // Optionally delete the customer's photo if exists
        if ($customer->photo_path) {
            Storage::disk('public')->delete($customer->photo_path);
        }

        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
