<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $categories = Product::search($search)->get();
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'warna' => 'required|string|max:255',
                'ukuran' => 'required|string|max:255',
                'harga' => 'required|string|max:255',
                'stok' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,svgw|max:2048',
                'category_id' => 'required|exists:categories,id',
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        
            // Get the category name
            $category = Category::findOrFail($request->category_id);
            $categoryName = $category->name;
        
            // Create the image name

            //create the image name using the category name, product name, and color
            //The Str::slug() function is used to create a URL-friendly version of the string, replacing spaces with underscores and removing any special characters.
            $imageName = Str::slug($categoryName . '_' . $request->name . '_' . $request->warna, '_');
            $imageExtension = $request->image->getClientOriginalExtension();
            $fullImageName = $imageName . '.' . $imageExtension;
        
            // Move the image
            $request->image->move(public_path('images/products'), $fullImageName);
        
            $product = Product::create([
                'name' => $request->name,
                'warna' => $request->warna,
                'ukuran' => $request->ukuran,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'image' => $fullImageName,
                'category_id' => $request->category_id,
            ]);
        
            return redirect()->route('admin.product.index')
                ->with('product_created', true);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to create product. Please try again.')->withInput();
        }        
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
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
