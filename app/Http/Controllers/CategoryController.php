<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categories = Category::search($search)->paginate(10);
        return view('admin.categories.index', compact('categories', 'search'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $categories = Category::search($search)->get();
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255|unique:categories',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();

                if ($errors->has('name') && $errors->first('name') === 'The name has already been taken.') {
                    return redirect()->back()->with('duplicate', 'This category already exists. Do you want to create it anyway?')->withInput();
                }

                return redirect()->back()->withErrors($validator)->withInput();
            }

            $category = Category::create([
                'name' => $request->name,
            ]);

            return redirect()->route('admin.category.index')->with('category_created', true);
        } catch (\Exception $e) {
            Log::error('Failed to create category: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to create category. Please try again.')->withInput();
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
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated =  $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        try {
            $category = Category::find($id);
            $category->update([
                'name' => $validated['name'],
            ]);

            return redirect()->route('admin.category.index')
                ->with('category_updated', 'Category updated successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to update category: ' . $e->getMessage());

            return redirect()->route('admin.category.index')
                ->with('error', 'Failed to update category. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();

            return redirect()->route('admin.category.index')
                ->with('category_deleted', true);
        } catch (\Exception $e) {
            Log::error('Failed to delete category: ' . $e->getMessage());

            return redirect()->route('admin.category.index')
                ->with('error', 'Failed to delete category. Please try again.');
        }
    }
}
