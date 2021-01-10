<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // return "This is list product from method index";
        return view('products.index');
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    public function show($product)
    {
        // return "Showing product witch id {$product} from CONTROLLER";
        return view('products.show');
    }

    public function edit($product)
    {
        return "Showing th form to edit the product with id $product";
    }

    public function update($product)
    {
        //
    }
    public function destroy($product)
    {
        //
    }
}
