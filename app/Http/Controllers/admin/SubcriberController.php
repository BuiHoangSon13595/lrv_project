<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subcriber;
use Illuminate\Http\Request;

class SubcriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Subcriber::Search()->paginate(5);
        return view('admin.subcriber.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcriber  $subcriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subcriber $subcriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcriber  $subcriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcriber $subcriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcriber  $subcriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcriber $subcriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcriber  $subcriber
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Subcriber $subcriber)
    {
        Subcriber::find($id)->delete();
        return redirect()->route('admin.Category.index');
    }
}
