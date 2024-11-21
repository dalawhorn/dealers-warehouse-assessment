<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::orderBy('created_at')
            ->get();

        return Inertia::render('Customer/Index', [
            'customers' => $customers
        ]);
    }

    public function create() {
        return Inertia::render('Customer/Create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

    }
}
