<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $topics = Topic::where('category_id', $category->id)->paginate(20);
        $filter = \Illuminate\Support\Facades\Request::except('page');
        return view('topics.index', compact('category', 'topics','filter'));
    }
}
