<?php

namespace App\Http\Controllers;

use App\Models\customer;

use App\Http\Requests\StorecustomerRequest;
use App\Http\Requests\UpdatecustomerRequest;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //untuk menapilkan semua data dan masuk ke customer index view
        $customers = customer::all();
        return view('customer.customer_index', compact(('customers')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //digunakan untuk memanggil halaman create
        return view('customer.customer_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecustomerRequest $request)
    {
        //digunakan untuk validator diamana melakukan ppengechekan apakah data yang dimasukkan benar
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|integer',
            'id_card' => 'required|integer',
        ]);
        if($validator->fails())return redirect()->back()->withInput()->withErrors($validator);


        //memasukkan data kedalam database berdasarkan data form yang telah diambil
        $data = customer::create([
            'name' => $request -> name,
            'address' => $request -> address,
            'phone' => $request ->phone,
            'id_card' => $request ->id_card,
        ]);

        return redirect()->route('customer.customer_index')->with('success', 'Vehicle created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //untuk masuk ke halaman edit
        $customer = Customer::findOrFail($id);
        return view('customer.customer_edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecustomerRequest $request, $id)
    {
                //digunakan untuk validator diamana melakukan ppengechekan apakah data yang dimasukkan benar
                $validator = Validator::make($request->all(),[
                    'name' => 'required|string',
                    'address' => 'required|string',
                    'phone' => 'required|integer',
                    'id_card' => 'required|integer',
                ]);
                if($validator->fails())return redirect()->back()->withInput()->withErrors($validator);

        //untuk update data berdasarkan id
        customer::findOrFail($id)->update([
            'name' => $request -> name,
            'address' => $request -> address,
            'phone' => $request ->phone,
            'id_card' => $request ->id_card,
        ]);
        return redirect()->route('customer.customer_index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        //digunakan untuk delete data pada tempat yang spesifik berdasarkan ID dan mengembalikan ke halaman index
        customer::findOrFail($id)->delete();

        return redirect()->route('customer.customer_index');
    }
}
