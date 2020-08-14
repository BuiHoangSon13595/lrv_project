<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\category\AddCategoryRequest;
use App\Http\Requests\category\EditCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::Search()->paginate(10);
        return view('admin.category.index',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.AddCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategoryRequest $request)
    {
        Category::add();
        return redirect()->route('admin.Category.index')->with('sucess','Sucess!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cats = Category::find($id);
        return view('admin.category.ShowCategory',compact('cats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::find($id);
        return view('admin.category.EditCategory',compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update($id, EditCategoryRequest $request, Category $category)
    {
        Category::modify($id);
        return redirect()->route('admin.Category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Category $category)
    {
        $ms = Category::Remove($id);
        return redirect()->route('admin.Category.index')->with('success',$ms);
    }
}
