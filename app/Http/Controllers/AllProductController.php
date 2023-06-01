<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class AllProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Product::with()->get());
        $products = Product::with('categories', 'suppliers')->get();

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Category::all(),
        ];
        return view('products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required'],
            'name' => ['required'],
            'description' => ['required'],
            'quantity' => ['required'],
            'price' => ['required'],
            'image' => ['mimes:png,jpg,jpeg'],
            's_name' => ['required'],
            's_email' => ['required'],
            's_contact' => ['required'],
            's_address' => ['required'],
        ]);

        $ten_percent = $request->price * 0.1;
        $sale_price = $ten_percent + $request->price;

        $file = $request['image'];

        if ($file) {
            $file_name = 'product' . time() . '-' . $file->getClientOriginalName();
        } else {
            $file_name = 'default.png';
        }


        $total_price = $request->price * $request->quantity;

        $data = [
            'categories_id' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'cost_price' => $request->price,
            'sale_price' => $sale_price,
            'total_price' => $total_price,
            'image' => $file_name,
        ];
        $is_product_created = Product::create($data);

        if ($file) {
            $file->move(public_path('uploads'), $file_name);
        }

        $supplier_data = [
            'product_id' => $is_product_created->id,
            'name' => $request->s_name,
            'email' => $request->s_email,
            'contact' => $request->s_contact,
            'address' => $request->s_address,
        ];

        $is_supplier_created = Supplier::create($supplier_data);

        if ($is_supplier_created) {
            $data = [
                'suppliers_id' => $is_supplier_created->id,
                'product_id' => $is_product_created->id,
                'total_price' => $total_price,
                'quantity' => $request->quantity,
            ];

            Purchase::create($data);

            return back()->with('success', 'Product and supplier is created');
        } else {
            return back()->with('error', 'Something is wrong data is not created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        $data = [
            'supplier' => $supplier
        ];
        return view('products.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        $data = [
            'supplier' => $supplier,
        ];
        return view('products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'quantity' => ['required'],
            'price' => ['required'],
            'image' => ['mimes:png,jpg,jpeg'],
            's_name' => ['required'],
            's_email' => ['required'],
            's_contact' => ['required',],
            's_address' => ['required'],
        ]);

        $ten_percent = $request->price * 0.1;
        $sale_price = $ten_percent + $request->price;

        $file = $request['image'];

        if ($file) {
            $file_name = 'product' . time() . '-' . $file->getClientOriginalName();
        } else {
            $file_name = $supplier->product->image;
        }

        $total_price = $request->price * $request->quantity;

        $data = [
            'categories_id' => $supplier->product->categories_id,
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'cost_price' => $request->price,
            'sale_price' => $sale_price,
            'total_price' => $total_price,
            'image' => $file_name,
        ];
        $is_product_updated = Product::find($supplier->product_id)->update($data);
        if ($file) {
            $file->move(public_path('uploads'), $file_name);
        }

        $supplier_data = [
            'product_id' => $supplier->product_id,
            'name' => $request->s_name,
            'email' => $request->s_email,
            'contact' => $request->s_contact,
            'address' => $request->s_address,
        ];

        $is_supplier_updated = Supplier::find($supplier->id)->update($supplier_data);

        $data = [
            'suppliers_id' => $supplier->id,
            'product_id' => $supplier->product_id,
            'total_price' => $total_price,
            'quantity' => $request->quantity,
            'action' => 'Updated',
        ];

        $is_purchase = Purchase::create($data);
        if($is_purchase){
            Purchase::where('product_id', $supplier->product_id)->first()->delete();
        }


        if ($is_supplier_updated) {
            return back()->with('success', 'Product and supplier is updated');
        } else {
            return back()->with('error', 'Something is wrong data is not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
