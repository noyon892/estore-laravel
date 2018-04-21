<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Product;
use App\Http\Requests\CreateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
    	// $products = Product::all();
    	//$products->load('category');
    	// $products = DB::table('products')
    	// 	->join('categories', 'products.categoryId', '=', 'categories.categoryId')
    	// 	->get();

    	//dd($products);
    	// return view('product.index', ['products' => $products]);
    }

    public function show($id)
    {
    	// $product = Product::find($id);
        $product=DB::table('products')
            ->where('id',$id)
            ->first();

    	//dd($product->category->categoryName);

    	return view('product.details', ['p' => $product]);
    }

    public function create()
    {
    	//Category::all()
    	$categories = DB::table('categories')
    		->get();

    	return view('product.create', ['categories' => $categories]);
    }

    public function edit($id)
    {
    	$product = Product::find($id);
    	return view('product.edit', ['product' => $product]);
    }

    public function delete($id)
    {
    	$product = Product::find($id);
    	return view('product.delete', ['product' => $product]);
    }

    public function store(CreateProductRequest $request)
    {
    	$p = new Product();
    	$p->productName = $request->pname;
    	$p->price = $request->price;
    	$p->quantity = $request->quantity;
    	$p->categoryId = $request->cat;
    	
        $p->save();

    	return redirect('/product');
    }

    public function update(Request $request, $id)
    {
    	$p = Product::find($id);
    	$p->productName = $request->pname;
    	$p->price = $request->price;
    	$p->quantity = $request->quantity;
    	$p->categoryId = $request->cat;
    	$p->save();
    	return redirect('/product');
    }

    public function destroy($id)
    {
    	$p = Product::find($id);
    	$p->delete();

    	return redirect('/product');
    }

    public function search(Request $request)
    {
    	$products = Product::where('productName', 'LIKE', "%$request->searchText%")
			->get();

		return view('product.index', ['products' => $products]);
    }
}
