<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\PorductResource;
use App\Jobs\HistoryJob;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $products = Product::orderBy('created_at', 'desc')->paginate(10);
            return view("Products.index", compact('products'));
        } catch (\Throwable $th) {
            return response("Internal Server Error", 500);
        }
    }

    public function create()
    {
        $categories = Category::orderBy('created_at')->paginate(27);
        return view('Products.create', compact("categories"));
    }

    public function edite($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('created_at')->paginate(7);
        return view('Products.edite', compact('product', "categories"));
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('Products.show', compact('product'));
    }

    public function store(Request $request)
    {
        $data  =   $request->validate([
            'name' => 'required|string',
            'description' => "required|string",
            "category_id" => "required|exists:categories,id",
            'price' => 'required|numeric|gt:0',
            "quantity" => 'required|integer|gt:0',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        $path = $request->file('image')->store('images/products', 'public');
        $data['image'] = $path;
        $data["status"] = "available";
        $product =  Product::create($data);
        HistoryJob::dispatch("Create", 'Products', $data['name'], $product->id);
        return redirect()->route("products.index")->with('success', 'Product Created Successfully');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $data =  $request->validate([
            'name' => 'required|string',
            'description' => "required|string",
            "category_id" => "required|exists:categories,id",
            'price' => 'required|numeric|gt:0',
            "quantity" => 'required|integer|gt:0',
            'image' => 'mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if (Storage::exists('public/' . $product->image)) {
                Storage::delete("public/" . $product->image);
            }
            $path = $request->file('image')->store('images/products', 'public');
            $data['image'] = $path;
        }
        $product->update($data);
        HistoryJob::dispatch("Update", 'Products', $data['name'], $product->id);
        return redirect()->route("products.index")->with('success', 'Product Update Successfully');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        if (Storage::exists('public/' . $product->image)) {
            Storage::delete("public/" . $product->image);
        }
        $product->delete();

        HistoryJob::dispatch("Delete", 'Products', $product->name, $product->id);

        return redirect()->route("products.index")->with('success', 'Product Deleted Successfully');
    }


    public function search(Request $request)
    {
        if ($request->has('query')) {
            $query = $request->get('query');
            $products = Product::search($query)->paginate(10);
            HistoryJob::dispatch("Search", 'Products', $query, '0');
            return view("Products.index", compact('products', 'query'));
        } else {
            return redirect()->route("products.index");
        }
    }
}
