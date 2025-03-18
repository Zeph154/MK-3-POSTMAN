<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
    return Customer::all();
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
    'fullname' => 'required|string|max:255',
    'address' => 'required|string',
    'email' => 'required|email|unique:customers,email',
    'phone' => 'required|string|min:10|max:15'
    ]);
    $customer = Customer::create($validated);
    return response()->json($customer, 201);
    }  

    public function update(Request $request, $id)
    {
    $validated = $request->validate([
    'fullname' => 'required|string|max:255',
    'address' => 'required|string',
    'email' => 'required|email|unique:customers,email',
    'phone' => 'required|string|min:10|max:15'
    ]);
    $customer = Customer::findOrFail($id);
    $customer->update($validated);
    return response()->json($customer);
    }

    public function destroy($id)
    {
    $customer = Customer::findOrFail($id);
    $customer->delete();
    return response()->json(['message' => 'Product deleted
    successfully']);
    }
}