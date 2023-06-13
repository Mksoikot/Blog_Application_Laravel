<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderby('id', 'desc')->get();
        return view('admin.category', compact('categories'));
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
            'name'=> 'required|unique:categories,name|max:255',
            'description'=> 'required',
        ]);
        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];

        Category::create($data);

        $notify = ['success' => 'Category Added Successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notify);
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
        $category = Category::find($id);
        $request->validate([
            'name'=> 'required|unique:categories,name,'. $category->id .'|max:255',
            'description'=> 'required',
        ]);
        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];
        $category->update($data);
        $notify = ['success' => 'Category Updated Successfully', 'alert-type' => 'info'];
        return redirect()->back()->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        $category->delete();
        $notify = ['success' => 'Category Delete Successfully', 'alert-type' => 'warning'];
        return redirect()->back()->with($notify);
    }
}
