<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Home Login-Register
Route::get('/login','HomeController@login')->name('login');
Route::post('/post_login','HomeController@post_login')->name('post_login');
Route::get('/register','HomeController@register')->name('register');
Route::get('/logout','HomeController@logout')->name('logout');
Route::post('/post_register','HomeController@post_register')->name('post_register');

//Reset Password
Route::get('/get_password','ForgotPasswordController@getFormResetPassword')->name('reset_password');
Route::post('/get_password','ForgotPasswordController@sendCodeResetPassword');
Route::get('/password/reset','ForgotPasswordController@resetPassword')->name('send_link');
Route::post('/password/reset','ForgotPasswordController@saveResetPassword');

//Home
Route::get('/','HomeController@index')->name('index');
Route::get('/shop/{id}-{slug}','HomeController@view')->name('view');
Route::get('/shop/product_detail/{id}-{slug}','HomeController@product_detail')->name('product_detail');
Route::get('/about','HomeController@about')->name('about');
Route::get('/service','HomeController@service')->name('service');
Route::get('/shop','HomeController@shop')->name('shop');
Route::get('/contact','HomeController@contact')->name('contact');
Route::get('/blog','HomeController@blog')->name('blog');
Route::get('/blog_view/{slug}','HomeController@blog_view')->name('blog_view');
Route::get('/single_blog/{id}','HomeController@single_blog')->name('single_blog');

Route::post('/subcriber','HomeController@sub')->name('sub');
Route::post('/contact/Con','HomeController@con')->name('con');

Route::group(['middleware'=>'client'],function(){
    //Favorite
    Route::get('/favorite','FavController@index')->name('fav.index');
    Route::get('/favorite/add-{id}','FavController@create')->name('fav.add');
    Route::get('/favorite/del-{id}','FavController@del')->name('fav.del');
    Route::get('/favorite/destroy','FavController@destroy')->name('fav.destroy');
    
    //Cart
    Route::get('/shopping_cart','HomeController@shopping_cart')->name('shopping_cart');
    Route::group(['prefix' => 'cart'], function () {
        Route::get('view','CartController@view')->name('cart.view');
        Route::post('add','CartController@add')->name('cart.add');
        Route::get('remove/{id}','CartController@remove')->name('cart.remove');
        Route::post('update','CartController@update')->name('cart.update');
        Route::get('clear','CartController@clear')->name('cart.clear');
    });
    Route::get('/checkout','HomeController@checkout')->name('checkout');
    Route::post('/submit','CheckoutController@submit')->name('submit');
    Route::get('/checkout_success','HomeController@checkout_success')->name('checkout_success');
    Route::post('/coupon','CartController@coupon')->name('coupon');

    //Profile-Edit
    Route::get('/profile','HomeController@profile')->name('profile');
    Route::post('/profile_edit','HomeController@profile_edit')->name('profile_edit');
    
    //Rating
    Route::post('/Rating/add','RatingCommentController@addRating')->name('rating.add');
    Route::post('/Comment/add','RatingCommentController@addComment')->name('comment.add');
});

//Admin-login-Register
Route::get('/admin/login','admin\AdminController@login')->name('admin.login');
Route::post('/admin/post_login','admin\AdminController@post_login')->name('admin.post_login');
Route::get('/admin/register','admin\AdminController@register')->name('admin.register');
Route::get('/admin/logout','admin\AdminController@logout')->name('admin.logout');
Route::post('/admin/post_register','admin\AdminController@post_register')->name('admin.post_register');
Route::get('/admin/error','admin\AdminController@error')->name('admin.error');
Route::get('/admin/profile', 'admin\AdminController@profile')->name('info');

//Admin
Route::group(['prefix'=>'admin','middleware'=>'auth','as'=>'admin.'],function(){
    Route::get('/','admin\AdminController@index')->name('index');
    Route::put('/profile/edit/{id}','admin\AdminController@post_profile')->name('profile');
    Route::put('/profile/edit-avatar/{id}','admin\AdminController@post_avatar')->name('avatar');
    Route::resource('/Category','admin\CategoryController');
    Route::resource('/Product','admin\ProductController');
    Route::resource('/Brand','admin\BrandController');
    Route::resource('/Color','admin\ColorController');
    Route::resource('/Role','admin\RoleController');
    Route::resource('/User','admin\UserController');
    Route::resource('/Blog','admin\BlogController');
    Route::resource('/Comment','admin\CommentController');
    Route::resource('/Payment','admin\PaymentController');
    Route::resource('/Shipping','admin\ShippingController');
    Route::resource('/Client','admin\ClientController');
    Route::resource('/Banner','admin\BannerController');
    Route::resource('/Subcriber','admin\SubcriberController');
    Route::resource('/Contact','admin\ContactController');
    Route::resource('/Quote','admin\QuoteController');
});





