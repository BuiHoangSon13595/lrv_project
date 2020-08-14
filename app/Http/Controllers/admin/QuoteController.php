<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Http\Requests\quote\EditQuoteRequest;
use App\Http\Requests\quote\AddQuoteRequest;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Quote::Search()->paginate(10);
        return view('admin.quote.index',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quote.AddQuote');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddQuoteRequest $request)
    {
        Quote::add();
        return redirect()->route('admin.Quote.index')->with('sucess','Sucess!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Quote $quote)
    {
        $cat = Quote::find($id);
        return view('admin.quote.EditQuote',compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update($id,EditQuoteRequest $request, Quote $quote)
    {
        Quote::modify($id);
        return redirect()->route('admin.Quote.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Quote $quote)
    {
        Quote::find($id)->delete();
        return redirect()->route('admin.Quote.index');
    }
}
