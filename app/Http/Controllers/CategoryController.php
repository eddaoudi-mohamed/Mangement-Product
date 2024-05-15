<?php

namespace App\Http\Controllers;

use App\Jobs\HistoryJob;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        try {
            $categories = Category::orderBy('created_at')->paginate(7);
            return view('Categories.index', compact('categories'));
        } catch (\Throwable $th) {
            return response("Internal Server Error", 500);
        }
    }


    public function create()
    {
        return view('Categories.create');
    }


    public function store(Request $request)
    {
        $data =  $request->validate([
            "name" => "required|string",
            "description" => "required|string",
        ]);
        $category  = Category::create($data);
        HistoryJob::dispatch("Create", 'Category', $data['name'], $category->id);

        //  redirect to categories page with success Message 
        return redirect()->route('categories.index')->with("success", "Category Created Successfully");
    }


    public function delete($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            HistoryJob::dispatch("Delete", 'Category', $category->name, $category->id);

            //  redirect to categories page with success Message 
            return redirect()->route('categories.index')->with("success", "Category deleted Successfully");
        } catch (\Throwable $th) {
            return redirect()->route('categories.index')->with("warrning", "Can't delete this Category");
        }
    }
}
