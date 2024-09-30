<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function customer()
    {
        return view('admin.customers.index');
    }

    public function customerCreate()
    {
        return view('admin.customers.create');
    }

    public function customerStore(Request $request)
    {
        return redirect()->route('admin.customer.index');
    }

    public function customerEdit($id)
    {
        return view('admin.customers.edit');
    }

    public function customerUpdate(Request $request, $id)
    {
        return redirect()->route('admin.customer.index');
    }

    public function customerDelete($id)
    {
        return redirect()->route('admin.customer.index');
    }

    public function category()
    {
        return view('admin.categories.index');
    }

    public function categoryCreate()
    {
        return view('admin.categories.create');
    }

    public function categoryStore(Request $request)
    {
        return redirect()->route('admin.category.index');
    }

    public function categoryEdit($id)
    {
        return view('admin.categories.edit');
    }

    public function categoryUpdate(Request $request, $id)
    {
        return redirect()->route('admin.category.index');
    }

    public function categoryDelete($id)
    {
        return redirect()->route('admin.category.index');
    }


    public function product()
    {
        return view('admin.products.index');
    }

    public function productCreate()
    {
        return view('admin.products.create');
    }

    public function productStore(Request $request)
    {
        return redirect()->route('');
    }


    public function productEdit($id)
    {
        return view('admin.products.edit');
    }

    public function productUpdate(Request $request, $id)
    {
        return redirect()->route('admin.product.index');
    }

    public function productDelete($id)
    {
        return redirect()->route('admin.product.index');
    }
}
