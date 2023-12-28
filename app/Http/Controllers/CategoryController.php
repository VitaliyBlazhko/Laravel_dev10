<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function create()
    {
//        for ($i = 1; $i <= 10; $i++) {
//            Category::create([
//                'name' => 'Category ' . $i,
//                'description' => 'Description for category ' . $i,
//            ]);
//        }

        $category = Category::create([
            'name' => 'Category 10',
            'description' => 'Description for category 10'

        ]);

        $category->save();
        return Redirect::route('categories.index');
    }

    public function read()
    {
        $categories = Category::query()->get();

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function readSample()
    {
        $categories = Category::query()->whereBetween('id', [4, 7])->get();
        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function update($id)
    {
        $category = Category::query()->find($id);
        $category->name = 'Category update 5';
        $category->description = 'Description for 5';
        $category->save();
        return Redirect::route('categories.index');


    }


    public function delete($id = null)
    {
        if ($id !== null) {
            $category = Category::query()->find($id)->delete();
        } else {
            $category = Category::query()->latest()->first()->delete();
        }

        return Redirect::route('categories.index');
    }

}
