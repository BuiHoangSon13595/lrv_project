<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\home\HomeRegisterRequest;
use App\Http\Requests\home\HomeLoginRequest;
use App\Http\Requests\home\PriceRequest;
use App\Models\Client;
use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Homes;
use App\Models\Favorite;
use App\Models\Banner;
use App\Models\Payment;
use App\Models\Shipping;
use App\Models\Subcriber;
use App\Models\Contact;
use App\Models\Quote;
use App\Models\district;
use App\Models\ward;
use App\Models\province;
use App\Models\Rating;
use App\Models\Comment;
use Auth;
use App\Helper\Home;

class HomeController extends Controller
{
    public function index()
    {
        // $favs = Favorite::where('client_id', Auth::guard('client')->user()->id)->count();
        // // dd($favs);
        $banners = Banner::where('position','top')->get();
        $cats = Category::all();
        $blogs = Blog::paginate(3);
        $products = Home::new();
        $product_price = Home::newest();
        return view('home.index',compact('products','product_price','cats','blogs','banners'));
    }

    public function shop()
    {
        $products = Product::search()->Cat()->Price()->Order()->paginate(11);
        $cats = Category::all();
        return view('home.shop',compact('products','cats'));
    }

    public function view($id,$slug)
    {
        $cats = Category::get();
        $cate = Category::where('slug',$slug)->first();
        $cate->setRelation('product', $cate->product()->Order()->paginate(4));
        return view('home.view',compact('cats','cate'));
    }

    public function product_detail($id,$slug)
    {
        $product = Product::where('slug',$slug)->first();
        $pro_cat = Category::find($product->category_id);
        $comment_ratings = Rating::where('product_id',$id)->Orderby('created_at','desc')->paginate(3);
        return view('home.product_detail',compact('product','pro_cat','comment_ratings'));
    }

    public function about()
    {
        $data = Quote::paginate(1);
        return view('home.about', compact('data'));
    }

    public function service()
    {
        return view('home.service');
    }
    
    public function blog()
    {
        $populars = Blog::orderBy('created_at','desc')->paginate('4');
        $blogs = Blog::search()->paginate(5);
        $cats = Category::all();
        return view('home.blog',compact('populars','blogs','cats'));
    }
    public function blog_view($slug)
    {
        $populars = Blog::orderBy('created_at','desc')->paginate('4');
        $cats = Category::get();
        $cate = Category::where('slug',$slug)->first();
        $cate->setRelation('getblog', $cate->getblog()->paginate(2));
        return view('home.blog_view',compact('populars','cats','cate'));
    }

    public function single_blog($id)
    {
        $populars = Blog::orderBy('created_at','desc')->paginate('4');
        $blogs = Blog::paginate(1);
        $blog = Blog::find($id);
        $cats = Category::all();
        $comments = Comment::where('blog_id',$id)->Orderby('created_at','desc')->paginate(3);
        return view('home.single_blog',compact('populars','blog','blogs','cats','comments'));
    }

    public function contact()
    {
        return view('home.contact');
    }


    public function checkout()
    {
        $payment = Payment::all();
        $shipping = Shipping::all();
        return view('home.checkout',compact('payment','shipping',));
    }
    public function checkout_success()
    {
        return view('home.checkout_success');
    }

    public function shopping_cart()
    {
        return view('home.shopping_cart');
    }

    public function profile()
    {
        return view('home.profile');
    }

    public function profile_edit()
    {
        $id = Auth::guard('client')->user()->id;
        Client::Modify($id);
        return redirect()->route('index');
    }

    public function sub(Request $request){
        Subcriber::Add();
        return redirect()->route('index');
    }

    public function con(Request $request){
        Contact::Add();
        return redirect()->route('contact');
    }
    
    public function login()
    {
        return view('home.login');
    }

    public function post_login(HomeLoginRequest $request)
    {
        $info = $request->only('email','password');
        if(Auth::guard('client')->attempt($info)){
            return redirect()->route('index');
        }else{
            return redirect()->back();
        }
    }

    public function register()
    {
        return view('home.register');
    }

    public function post_register(HomeRegisterRequest $request)
    {
        Client::Add();
        return redirect()->route('login');
    }
    
    public function logout(){
        session(['cart' => []]);
        Auth::guard('client')->logout();
        return redirect()->route('index');
    }
}
