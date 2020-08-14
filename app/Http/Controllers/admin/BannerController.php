<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Requests\banner\AddBannerRequest;
use App\Http\Requests\banner\EditBannerRequest;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $banners = Banner::Search()->get();
        return view('admin.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.banner.addBanner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBannerRequest $request)
    {
        Banner::add();
        return redirect()->route('admin.Banner.index')->with('sucess','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.editBanner',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        Banner::modify($id);
        return redirect()->route('admin.Banner.index')->with('success','Sửa thành công!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::where('id',$id)->delete();
        return redirect()->route('admin.Banner.index')->with('success','Xóa thành công');
    }
}
