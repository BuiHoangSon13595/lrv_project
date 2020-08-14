<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client_id = Auth::guard('client')->user()->id;
        $favs = Favorite::where('client_id', $client_id)->get();
        return view('home.fav',compact('favs'));
    }

    public function create($id)
    {
        $pro = Favorite::where('product_id',$id)->first();
        if(!$pro){
            Favorite::create([
                'client_id' => Auth::guard('client')->user()->id,
                'product_id'=> $id
            ]);
        }
        return redirect()->back();
    }

    
    public function del($id, Favorite $favorite)
    {
        Favorite::find($id)->delete();
        return redirect()->back();
    }

    public function destroy(){
        Favorite::truncate();
        return redirect()->back();
    }
}
