<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostComment;

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

        $commentObj = new PostComment();
        $comments = $commentObj->join('users', 'users.id', '=', 'post_comments.user_id')
        ->select('post_comments.*', 'users.name as user_name', 'users.photo as user_photo')
        ->where('post_comments.post_id', $id)
        ->paginate('3');

        return view('layouts.user.single_post_view', compact('post','comments'));
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

    public function comment_store(Request $request, $id){
        // dd($request->all());
        $data =[
            'post_id' => $id,
            'user_id' => auth()->user()->id,
            'comment' => $request->comment,
        ];
        PostComment::create($data);
        return redirect()->back()->with('success','Comment added successfully');

    }
}
