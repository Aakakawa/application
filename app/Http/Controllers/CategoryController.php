<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        //return view('categories.index')->with(['articles' => $category->getByCategory($category->id)]);
        return view('categories.index')->with(['articles' => $category->getByCategory()]);
    }
    
    
}
