<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Customer;
use App\Models\BusinessType;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Customer/Index', [
            'customers' => $customers
        ]);
    }

    public function create() {
        $businessTypes = BusinessType::all();

        return Inertia::render('Customer/Create', [
            'businessTypes' => $businessTypes
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address_1' => 'required',
            'address_2' => 'nullable',
            'city' => 'required',
            'state' => 'required|max:2',
            'zip' => 'required|size:5',
            'phone' => 'required|regex:/^(\+\d{1,2}\s?)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/',
            'business_type_id' => 'required',
            'shipment_days' => 'required'
        ],
        [
            'address_1.required' => 'The billing address field is required.'
        ]);

        Customer::create($validated);

        return redirect('/');
    }
}
