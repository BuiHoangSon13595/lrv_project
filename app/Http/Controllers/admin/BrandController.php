<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\brand\AddBrandRequest;
use App\Http\Requests\brand\EditBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::Search()->paginate(3);
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.addBrand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBrandRequest $request)
    {
        Brand::add();
        return redirect()->route('admin.Brand.index')->with('sucess','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Brand $brand)
    {
        $brand = Brand::find($id);
        return view('admin.brand.editBrand',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update($id, EditBrandRequest $request)
    {
        Brand::modify($id);
        return redirect()->route('admin.Brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Brand $brand)
    {
        $ms = Brand::remove($id);
        return redirect()->route('admin.Brand.index')->with('success',$ms);
    }
}
