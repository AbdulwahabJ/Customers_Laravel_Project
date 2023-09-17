<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::select('id','name', 'email')->get();

        return view('customer.index',['customers' => $customers]);
    }

    public function edit(string $id)
    {
       $customer= Customer::find($id);
    return view('customer.update',compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer= Customer::find($id);

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->save();

        return redirect()->route('dashboard.customers.index')->with('success', 'Customer updated successfully');
    }

    public function delete(string $id)
    {
       $customer= Customer::find($id);
       $customer->delete();
       return redirect()->route('dashboard.customers.index')->with('success', 'Customer Deleted Successfully');

    }










//     public function update(Request $request, $id)
// {
//     $customer = Customer::find($id);
//     // dd($customer);

//     $customer->name = $request->input('name');
//     $customer->email = $request->input('email');

//     $customer->save();

//     return redirect()->route('dashboard.customers.index')->with('success', 'Customer updated successfully');
// }
}
