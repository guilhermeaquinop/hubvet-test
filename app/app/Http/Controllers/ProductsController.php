<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Sectors;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    public function create()
    {   
        $sectors = Sectors::all();
        return view ('layouts.products', compact('sectors'));
    }

    public function store(Request $request)
    {
        $products = new Products();

        $products->name = $request->name;

        $products->id_sector = $request->id_sector;

        $user = auth()->user();
        
        $products->id_market = $user->id;

        $products->save(); 

        return redirect('/products')->with('successfulRegistration', 'Registration successful!');
    }

    public function list($id)
    {
        $products = Products::getProductsFromSector($id);
        return view('layouts.products_list', compact('products')); 
    }

    public function edit($id, $id_sector) 
    {
        $product = Products::findOrFail($id);
        $sectors = Sectors::all();
        $sector = Sectors::findOrFail($id_sector);
        return view('layouts.products_edit', compact('product', 'sectors', 'sector'));
    }

    public function update(Request $request) 
    {
        $product = $request->all();
        Products::findOrFail($request->id)->update($product);
        return redirect('/sectors')->with('successfulRegistration', 'Update successful!');
    }

    public function destroy($id)
    {
        Products::findOrFail($id)->delete();
        return redirect('/sectors')->with('successfulDelete', 'Record deleted!');
    }
}
