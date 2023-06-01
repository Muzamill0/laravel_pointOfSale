<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Category $category)
    {
            $products = Product::where('categories_id', $category->id)->get();
            return view('categories.products.index', ['products' => $products, 'category' => $category]);
    }

    public function create(Category $category)
    {
        $data = [
            'category' => $category,
            'categories' => Category::all(),
        ];
        return view('categories.products.create', $data);
    }

    public function store(Request $request, Category $category)
    {
        $request->validate([
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
            'categories_id' => $category->id,
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'cost_price' => $request->price,
            'sale_price' => $sale_price,
            'total_price' => $total_price,
            'image' => $file_name,
        ];
        $is_product_created = Product::create($data);

        $file->move(public_path('uploads'), $file_name);

        $supplier_data = [
            'product_id' => $is_product_created->id,
            'name' => $request->s_name,
            'email' => $request->s_email,
            'contact' => $request->s_contact,
            'address' => $request->s_address,
        ];


        // dd($supplier_data);
        $is_supplier_created = Supplier::create($supplier_data);

        if($is_supplier_created){

            $total_price = $request->price * $request->quantity;

            $data = [
                'suppliers_id' => $is_supplier_created->id,
                'product_id' => $is_product_created->id,
                'total_price' => $total_price,
                'quantity' => $request->quantity,
            ];

            Purchase::create($data);
            return back()->with('success', 'Product and supplier is created');
        } else{
            return back()->with('error', 'Something is wrong data is not created');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        $data = [
            'supplier' => $supplier,
        ];
        return view('categories.products.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
