<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        // return "This is list product from method index";
        // $products = DB::table('products')->get();
        // $products = Product::all();
        // dd($products);
        // return $products; # Retorna en la información en JSON
        return view('products.index')->with([
            'products' => Product::all()
        ]);
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
        // $product = DB::table('products')->where('id', '=', $product)->get();
        // $product = DB::table('products')->where('id', '=', $product)->first();
        // $product = DB::table('products')->find($product);
        // $product = Product::find($product);
        $product = Product::findOrFail($product);
        // dd($product); # Depuramos el error

        return view('products.show')->with([
            'product' => $product,
            'html' => '<h2>Html Jhonfa</html>'
        ]);
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
