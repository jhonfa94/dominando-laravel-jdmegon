<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /* ===================== 
      APLICANDO MIDDLEWARE PARA RESTRINGIR EL ACCESO 
    ========================= */ 
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

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
        return view('products.create');
    }

    public function store()
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'price' => 'required|min:1',
            'stock' => 'required|min:0',
            'status' => ['required', 'in:available,unavailable']
        ];

        request()->validate($rules);

        if (request()->status == 'available' && request()->stock == 0) {
            // session()->put('error', 'If available must have stock'); # Crea la sesión 
            // session()->flash('error', 'If available must have stock');
            return redirect()
                ->back()
                ->withInput(request()->all())
                ->withErrors('If available must have stock');
        }

        // session()->forget('error'); # Elimina la sessión de error creada


        // dd(request());
        # PRIMERA FORMA DE INSERT
        /* $product = Product::create([
            'title' => request()->title,
            'description' => request()->description,
            'price' => request()->price,
            'stock' => request()->stock,
            'status' => request()->status
        ]);    */
        // return $product;

        $product = Product::create(request()->all());
        // return $product;

        # Mensaje de sessión para visualizar en la vista de blade
        // session()->flash('success', "The new product with id {$product->id} was created");

        // REDIRECCIONES DESPUES DE GUARDAR
        // return redirect()->back(); # Nos regresa a la ubicación anterior
        // return redirect()->action([ProductController::class, 'index']); # Ejecuta la acción de un controlador
        return redirect()->route('products.index')->with('success',"The new product with id {$product->id} was created"); # Nos redirecciona a  la ruta que le especifiquemos
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
        return view('products.edit')->with([
            'product' => Product::findOrFail($product)
        ]);
    }

    public function update($product)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'price' => 'required|min:1',
            'stock' => 'required|min:0',
            'status' => ['required', 'in:available,unavailable']
        ];

        request()->validate($rules);

        $product = Product::findOrFail($product);
        $product->update(request()->all());
        // return $product;
        return redirect()->route('products.index')->withSuccess("The product with id {$product->id} was edited");
    }
    public function destroy($product)
    {
        //Product::findOrFail($product)
        $product = Product::findOrFail($product);
        $product->delete();
        // return $product;
        return redirect()->route('products.index')->withSuccess("The product with id {$product->id} was deleted");
    }
}
