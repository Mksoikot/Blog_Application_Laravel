<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class UserController extends Controller
{
    public function index(){
        $objPost = new Post();

        $posts = $objPost->join('categories','categories.id','=','posts.category_id')
        ->select('posts.*','categories.name as category_name')
        ->where('posts.status',1)
        ->orderby('posts.id', 'desc')
        ->get();

        $categories = Category::all();
        // $posts = Post::all()->where('status', 1)->sortByDesc('created_at');
        // dd($post);
        return view('layouts.user.index', compact('posts', 'categories'));
    }

    public function single_post_view($id){
        $objPost = new Post();

        $post = $objPost->join('categories','categories.id','=','posts.category_id')
        ->select('posts.*','categories.name as category_name')
        ->where('posts.id', $id)
        ->first();

        return view('layouts.user.single_post_view', compact('post'));
    }
    public function filterby_category($id){
        $objPost = new Post();

        $posts = $objPost->join('categories','categories.id','=','posts.category_id')
        ->select('posts.*','categories.name as category_name')
        ->where('posts.status', 1)
        ->where('posts.category_id', $id)
        ->orderby('posts.id', 'desc')
        ->get();

        return view('layouts.user.filter_by_category', compact('posts'));
    }
}
