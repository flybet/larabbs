<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use App\Models\User;
use App\Models\Link;

class CategoriesController extends Controller
{
    public function show(Category $category,Request $request,Topic $topic,User $user, Link $link)
    {
//        $topics = Topic::where('category_id', $category->id)->paginate(20);
        $topics = $topic->withOrder($request->order)->where('category_id', $category->id)->paginate(20);

        // 活跃用户列表
        $active_users = $user->getActiveUsers();
        // 资源链接
        $links = $link->getAllCached();

        $filter = \Illuminate\Support\Facades\Request::except('page');
        return view('topics.index', compact('category', 'topics','filter','active_users', 'links'));
    }
}
