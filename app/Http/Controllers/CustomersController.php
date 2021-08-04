<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $acktive = 'Customer';
        $customer = Customer::all();
        return view('customer.list', compact('customer','acktive'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $acktive = 'Customer';
        return view('customer.create', compact('acktive'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        Customer::create($request->all());
        return redirect('/customer')->with('status', 'Data customer berhasil ditambah !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $acktive = 'Customer';
        return view('customer.edit', compact('customer','acktive') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //

        if ($request->no_handphone != $customer->no_handphone) {
            
            $request->validate([
                'no_handphone'      => 'required|unique:customers,no_handphone',
                'nama_customer'     => 'required',
                'alamat'            => 'required'
            ]);
        } else {
            $request->validate([
                'no_handphone'      => 'required',
                'nama_customer'     => 'required',
                'alamat'            => 'required'
            ]);
        }

        Customer::where('id_customer', $customer->id_customer)
                    ->update([
                        'no_handphone'      => $request->no_handphone,
                        'nama_customer'     => $request->nama_customer,
                        'alamat'            => $request->alamat
                    ]);

        return redirect('/customer')->with('status', 'Data customer berhasil diupdate !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        Customer::destroy($customer->id_customer);
        return redirect('/customer')->with('status', 'Data customer berhasil dihapus !');
    }

    public function getCustomerbyPhone(Request $request)
    {

        $customer = DB::table('customers')->select(DB::raw('*'))->where('no_handphone', $request->no_handphone)->first();
        

        return response()->json(['item'=>$customer]);
    }
}
