<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;
use App\Models\customer;
use App\Models\vehicle;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        //untuk menapilkan semua data dan masuk ke customer index view
        $order = order::all();
        $customer_id = $id;
        return view('order.order_index', compact('order', 'customer_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //untuk membuat order berdasarkan id customer

        $vehicle = vehicle::all();
        $customer_id = $id;
        return view('order.order_create', compact('vehicle','id'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreorderRequest $request, $id)
    {

        //untuk menyimpan data order berdasarkan customer id dan vehicle id

        $data = order::create([
            'customer_id' => $id,
            'vehicle_id' => $request->selected_value
        ]);

        return redirect()->route('order.order_index', ['id' => $id]);

    }

    /**
     * Display the specified resource.
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //untuk masuk ke halaman edit
        $vehicle = vehicle::all();
        $order = order::findOrFail($id);
        return view('order.order_edit', compact('vehicle', 'order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateorderRequest $request, $id)
    {
        //untuk menyimpan data yang telah diganti berdasarkan id
        $customer_id = order::findOrFail($id)->customer->id;
        order::findOrFail($id)->update([
            'vehicle_id' => $request->selected_value,
        ]);
        return redirect()->route('order.order_index', ['id' => $customer_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        //digunakan untuk delete data pada tempat yang spesifik berdasarkan ID yang dimiliki customer dan mengembalikan ke halaman index
        $customer_id = order::findOrFail($id)->customer_id;
        order::findOrFail($id)->delete();
        $order = order::all();
        return view('order.order_index', compact('customer_id', 'order'));

    }
}
