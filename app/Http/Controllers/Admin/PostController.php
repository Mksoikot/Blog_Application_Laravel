<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Spatie\Backtrace\File;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();

        $objPost = new Post();

        $posts = $objPost->join('categories','categories.id','=','posts.category_id')
        ->select('posts.*','categories.name as category_name')
        ->get();

        // dd($posts);


        return view('admin.post',compact('categories','posts'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'sub_title'=> 'required',
            'category_id'=> 'required',
            'description'=> 'required',
        ]);
        $data = [
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'status'=>$request->status
        ];
        if($request->hasFile('thambnil')){
            $file = $request->file('thambnil');
            $extantion = $file->getClientOriginalExtension();
            $filename = time().'-'.$extantion;

            //Resize Image Intervantion
            $thambnil = Image::make($file);
            $thambnil->resize(600, 360)->save(public_path('post_thambnil/' . $filename));

            // Alternate Image upload
            // $file->move(public_path('post_thambnil'), $filename);

            $data['thambnil']= $filename;
        }
        Post::create($data);
        return redirect()->back()->with('success','Post added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=> 'required',
            'sub_title'=> 'required',
            'category_id'=> 'required',
            'description'=> 'required',
        ]);
        $data = [
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'status'=>$request->status
        ];
// dd($data);

        if($request->hasFile('thambnil')){
            // if($request->old_thumb){
            //    File::delete(public_path('post_thambnil/'. $request->old_thumb));
            // }
            $file = $request->file('thambnil');
            $extantion = $file->getClientOriginalExtension();
            $filename = time().'-'.$extantion;
            //Resize Image Intervantion
            $thambnil = Image::make($file);
            $thambnil->resize(600, 360)->save(public_path('post_thambnil/' . $filename));
            // $file->move(public_path('post_thambnil'), $filename);
            $data['thambnil']= $filename;
        }

        Post::where('id',$id)->update($data);
        return redirect()->back()->with('success','Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('success','Post Deleted successfully');
    }
}
