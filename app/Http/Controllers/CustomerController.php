<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('customers.index', [
            'customers' => Customer::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request) : RedirectResponse
    {
        Customer::create($request->all());
        return redirect()->route('customers.index')
                ->withSuccess('New customer is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer) : View
    {
        return view('customers.show', [
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer) : View
    {
        return view('customers.edit', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer) : RedirectResponse
    {
        $customer->update($request->all());
        return redirect()->back()
                ->withSuccess('Customer is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer) : RedirectResponse
    {
        $customer->delete();
        return redirect()->route('customers.index')
                ->withSuccess('Customer is deleted successfully.');
    }
}