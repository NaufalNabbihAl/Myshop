<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('admin.customers.index');
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.customer.index');
    }

    public function edit($id)
    {
        return view('admin.customers.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.customer.index');
    }

    public function delete($id)
    {
        return redirect()->route('admin.customer.index');
    }
}
