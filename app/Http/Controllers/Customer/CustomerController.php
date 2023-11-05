<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Helper\Helper;
use App\Rules\CustomerEmailCheckRule;
use App\Rules\CustomerUpdateEmailCheck;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::orderBy('id','DESC')->get();
        return Inertia::render('Customer/List',['customers'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Customer/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => ['required',new CustomerEmailCheckRule],
            'phone_number'  => 'required|min:11|max:11',
            'gender'        => 'required',
            'age'           => 'required'
        ]);

        Customer::create([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'mobile_number' => $request->phone_number,
            'gender'        => $request->gender,
            'age'           => $request->age,
        ]);


        return Redirect::route('customers.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);
        return Inertia::render('Customer/Edit',['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => ['required',new CustomerUpdateEmailCheck],
            'phone_number'  => 'required|min:11|max:11',
            'gender'        => 'required',
            'age'           => 'required'
        ]);

        Customer::find($id)->update([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'mobile_number' => $request->phone_number,
            'gender'        => $request->gender,
            'age'           => $request->age,
        ]);


        return Redirect::route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::find($id)->delete();
        return Redirect::back();
    }
}
