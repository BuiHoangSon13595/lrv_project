<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Requests\color\AddColorRequest;
use App\Http\Requests\color\EditColorRequest;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::Search()->get();
        return view('admin.color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color.addColor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddColorRequest $request)
    {
        Color::add();
        return redirect()->route('admin.Color.index')->with('sucess','Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Color $color)
    {
        $color = Color::find($id);
        return view('admin.color.editColor',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update($id, EditColorRequest $request)
    {
        Color::modify($id);
        return redirect()->route('admin.Color.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Color $color)
    {
        $ms = Color::remove($id);
        return redirect()->route('admin.Color.index')->with('success',$ms);
    }
}
