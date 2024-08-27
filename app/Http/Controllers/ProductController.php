<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = product::get();
        return view('admin.products.index', compact('data'));

    }
    public function createView()
    {
        //
        return view('admin.products.product-create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
                //

          
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        //$imagePath = time().'.'.$request->image->extension();        
 
     //   $request->image->move(public_path('images'), $imagePath);
        $imagePath = $request->file('image')->store('products', 'public');
        Product::create([
            'product_name' => $request->name,
            'image' => $imagePath,
            'description' => $request->description,
            'price' => $request->price,
            'special_price' => $request->special_price,
            'price_type' => $request->price_type,
            'sp_start' => $request->sp_start,
            'sp_end' => $request->sp_end,
        ]);
     
        return back()->with('success', 'Product created successfully!');
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
    public function edit(Product $product)
    {
       // dd($product);
        return view('admin.products.edit', compact('product'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
       // dd($request);
        // Validate the input
        // $request->validate([
        //     'name' => 'required|string|max:255',
        // ]);
    
        // Check if a new image has been uploaded
        if ($request->hasFile('image')) {
            // Delete the old image
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
    
            // Store the new image
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            // Keep the old image
            $imagePath = $product->image;
        }
    
        // Update the product with new data
        $product->update([
            'product_name' => $request->product_name,
            'image' => $imagePath,
            'description' => $request->description,
            'price' => $request->price,
            'special_price' => $request->special_price,
            'price_type' => $request->price_type,
            'sp_start' => $request->sp_start,
            'sp_end' => $request->sp_end
        ]);
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Optionally, delete the image from storage
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
    
        // Delete the product
        $product->delete();
    
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
    
}
