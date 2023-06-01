<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'sales' => Sale::with('customer', 'product')->get(),
        ];
        // dd($data);
        return view('products.sales.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Supplier $supplier)
    {
        $data = [
            'supplier' => $supplier,
        ];
        return view('products.sales.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Supplier $supplier)
    {
        $request->validate([
            'quantity' => ['required'],
            'c_name' => ['required'],
            'c_email' => ['required'],
            'c_contact' => ['required'],
            'c_address' => ['required'],
        ]);

        $quantity = $supplier->product->quantity - $request->quantity;

        $data = [
            'quantity' => $quantity,
        ];

        $is_product_updated = Product::find($supplier->product_id)->update($data);
        if($is_product_updated){
            $customer_data = [
                'product_id' => $supplier->product_id,
                'name' => $request->c_name,
                'email' => $request->c_email,
                'contact' => $request->c_contact,
                'address' => $request->c_address,
            ];

            $is_customer_created = Customer::create($customer_data);

            if($is_customer_created){
                $sale_data = [
                    'customer_id' => $is_customer_created->id,
                    'product_id' => $supplier->product_id,
                    'total_price' => $request->price,
                    'quantity' => $request->quantity,
                ];
                $is_sale_created = Sale::create($sale_data);
                if($is_sale_created){
                    return back()->with('success', 'sale has been created');
                }else{
                    return back()->with('success', 'sale has failed to create');
                }
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        $data = [
            'sale' => $sale,
        ];
        return view('products.sales.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        Sale::find($sale->id)->delete();
        return back();

    }
}
