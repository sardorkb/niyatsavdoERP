<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Agreement;

class AgreementController extends Controller
{
    /**
     * Display a listing of agreements for a specific customer.
     */
    public function index(Customer $customer)
    {
        // Fetch all agreements for this customer
        $agreements = $customer->agreements()->latest()->paginate(10);

        return view('agreements.index', compact('customer', 'agreements'));
    }

    /**
     * Show the form for creating a new agreement for a specific customer.
     */
    public function create(Request $request)
    {
        // Retrieve the customer by ID (passed via query parameter or route)
        $customer = Customer::findOrFail($request->customer_id);

        return view('agreements.create', compact('customer'));
    }

    /**
     * Store a newly created agreement in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',  // Ensure customer exists
            'duration' => 'required|integer|min:1',  // Duration in months, must be at least 1
            'product_name' => 'required|string|max:255',  // Product name must be a string with a max length of 255
            'product_quantity' => 'required|integer|min:1',  // Product quantity must be an integer greater than or equal to 1
            'product_cost_price' => 'required|numeric|min:0',  // Cost price must be numeric and greater than or equal to 0
            'product_markup' => 'required|numeric|min:0',  // Markup must be numeric and greater than or equal to 0
            'notes' => 'nullable|string|max:1000',  // Notes field is optional but if present, cannot exceed 1000 characters
        ]);

        // Generate the Agreement Number (auto-increment logic)
        $lastAgreement = Agreement::latest()->first();
        $newAgreementNumber = $lastAgreement ? ($lastAgreement->id + 1) : 1;  // Increment based on the last agreement ID or start at 1
        $agreementNumber = sprintf("SH-%06d", $newAgreementNumber);  // Format as AGR-000001, AGR-000002, etc.

        // Calculate product price after markup
        $productPriceAfterMarkup = $validated['product_cost_price'] * (1 + $validated['product_markup'] / 100);

        // Create the Agreement
        $agreement = Agreement::create([
            'customer_id' => $validated['customer_id'],
            'agreement_number' => $agreementNumber,
            'agreement_date' => now(),  // Set current date and time
            'duration' => $validated['duration'],
            'product_name' => $validated['product_name'],
            'product_quantity' => $validated['product_quantity'],
            'product_cost_price' => $validated['product_cost_price'],
            'product_markup' => $validated['product_markup'],
            'product_price_after_markup' => $productPriceAfterMarkup,
            'notes' => $validated['notes'],
        ]);

        // Redirect to the customer page with success message
        return redirect()->route('customers.show', $agreement->customer_id)
            ->with('success', 'Shartnoma muvaffaqiyatli qo‘shildi!');
    }



    /**
     * Display the specified agreement.
     */
    public function show(Agreement $agreement)
    {
        return view('agreements.show', compact('agreement'));
    }

    /**
     * Show the form for editing the specified agreement.
     */
    public function edit(Agreement $agreement)
    {
        return view('agreements.edit', compact('agreement'));
    }

    /**
     * Update the specified agreement in storage.
     */
    public function update(Request $request, Agreement $agreement)
    {
        $validated = $request->validate([
            'agreement_number' => 'required|string|max:255|unique:agreements,agreement_number,' . $agreement->id,
            'agreement_date' => 'required|date',
            'duration' => 'required|integer|min:1',
            'product_name' => 'required|string|max:255',
            'product_quantity' => 'required|integer|min:1',
            'product_cost_price' => 'required|numeric|min:0',
            'product_markup' => 'required|numeric|min:0',
            'notes' => 'nullable|string|max:1000',
        ]);

        // Update derived values
        $product_price = $validated['product_cost_price'] + ($validated['product_cost_price'] * ($validated['product_markup'] / 100));
        $end_date = now()->addMonths($validated['duration']);

        // Update agreement
        $agreement->update([
            'agreement_number' => $validated['agreement_number'],
            'agreement_date' => $validated['agreement_date'],
            'duration' => $validated['duration'],
            'end_date' => $end_date,
            'product_name' => $validated['product_name'],
            'product_quantity' => $validated['product_quantity'],
            'product_cost_price' => $validated['product_cost_price'],
            'product_markup' => $validated['product_markup'],
            'product_price_after_markup' => $product_price,
            'notes' => $validated['notes'],
        ]);

        return redirect()
            ->route('customers.show', $agreement->customer_id)
            ->with('success', 'Agreement updated successfully.');
    }

    /**
     * Remove the specified agreement from storage.
     */
    public function destroy(Agreement $agreement)
    {
        $agreement->delete();

        return redirect()
            ->route('customers.show', $agreement->customer_id)
            ->with('success', 'Agreement deleted successfully.');
    }
}
