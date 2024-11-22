<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Customer;
use App\Models\BusinessType;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Customer/Index', [
            'customers' => $customers
        ]);
    }

    public function show($id) {
        $customerData = Customer::with('businessType')->find($id);

        return Inertia::render('Customer/Show', [
            'customerData' => $customerData,
            'businessType' => $customerData->businessType->name
        ]);
    }

    public function create() {
        $businessTypes = BusinessType::all();

        return Inertia::render('Customer/Create', [
            'businessTypes' => $businessTypes
        ]);
    }

    public function store(CustomerRequest $request) {
        $validated = $request->validated();
        Customer::create($validated);

        return redirect('/');
    }

    public function edit(Request $request, $id) {
        $businessTypes = BusinessType::all();
        $customerData = Customer::find($id);

        return Inertia::render('Customer/Edit', [
            'businessTypes' => $businessTypes,
            'customerData' => $customerData
        ]);
    }

    public function update(CustomerRequest $request, $id) {
        $validated = $request->validated();

        $customer = Customer::find($id);
        $customer->update($validated);

        return redirect('/');
    }

    public function destroy($id) {
        $customer = Customer::find($id);

        $customer->delete();
        
        return redirect('/');
    }
}
