<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string']
        ]);


        $category = Category::create([
            'name' => $data['name'],
            'description' => $data['description']

        ]);

        $category->save();
        return back()->with('success', 'Category created successfully.');
    }

    public function read()
    {
        $categories = Category::all();

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function item($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.item', [
            'category' => $category
        ]);
    }

    public function readSample()
    {
        $categories = Category::query()->whereBetween('id', [4, 7])->get();
        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string']
        ]);


        Category::query()->findOrFail($data['category_id'])->update([
            'name' => $data['name'],
            'description' => $data['description']

        ]);

        return back()->with('success', 'Category updated successfully.');


    }


    public function delete($id)
    {

        $category = Category::query()->findOrFail($id)->delete();

        return Redirect::route('categories.index');
    }


}
