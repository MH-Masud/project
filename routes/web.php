<?php

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

/*Route::get('/', function () {
    return view('welcome');
});
*/


/*============================== Front End ================================ */

/* Welcome Controller Route   */

Route::get('/','WelcomeController@index');
Route::get('/contact','WelcomeController@contact');
Route::get('/details/{id}','WelcomeController@details');
Route::get('/subcategory/{c_id}/{s_id}','WelcomeController@category');

/* Welcome Controller Route   */

/* Ahth HomeController route  */


Auth::routes();

Route::get('/dashbord', 'HomeController@index')->name('home');
Route::get('/dashbord/order-details/{id}','HomeController@showOrderDetails');
Route::get('/dashbord/order-edit/{id}','HomeController@editOrderDetails');
Route::post('/dashbord/order-update','HomeController@updateOrderDetails');
/* Ahth HomeController route  */

/* Ahth Cart Controller route  */


Route::post('/cart','CartController@addToCart');
Route::get('/add_cart','CartController@addCart');
Route::get('/delete-cart-item/{id}','CartController@deleteCartItem');
Route::post('/cart_update_quantity','CartController@update');

/* Ahth Cart Controller route  */

/* checkout controller route  */

Route::get('/checkout','CheckoutController@checkout');
Route::post('/checkout/sign-up','CheckoutController@customerRegister');
Route::get('/checkout/register','CheckoutController@register');
Route::post('/user-login','CheckoutController@login');
Route::get('/checkout/shipping','CheckoutController@showShippingForm');
Route::post('/checkout/save-shipping','CheckoutController@saveShipping');
Route::get('/checkout/payment','CheckoutController@showPaymentForm');
Route::post('/checkout/save-order','CheckoutController@saveOrderInfo');
Route::get('/checkout/home','CheckoutController@customerHome');

/* checkout controller route  */


/* Brand controller route  */

Route::get('/category-brand/{id}','BrandController@show');
Route::get('/means','BrandController@means');

/* Brand controller route  */


/*============================== Front End ================================ */



/*============================== Backend ================================ */


Route::group(['middleware'=>'AuthenticateMiddleware'],function(){
 
     /* Category Controller Info */

Route::get('/category/add','CategoryController@createCategory');
Route::post('/category/save','CategoryController@storeCategory');
Route::get('/category/manage','CategoryController@mangeCategory');
Route::get('/category/edit/{id}','CategoryController@editCategory');
Route::post('/category/update','CategoryController@updateCategory');
Route::get('/category/delete/{id}','CategoryController@deleteCategory');

/* Category Controller Info */

/* Manufacture Controller Info */

Route::get('/manufacture/add','ManufactureController@createManufacture');
Route::post('/manufacture/save','ManufactureController@storeManufacture');
Route::get('/manufacture/manage','ManufactureController@manageManufacture');
Route::get('/manufacture/edit/{id}','ManufactureController@editManufacture');
Route::post('/manufacture/update','ManufactureController@updateManufacture');
Route::get('/manufacture/delete/{id}','ManufactureController@deleteManufacture');

/* Manufacture Controller Info */

/* Product Controller Info */

Route::get('/product/add','ProductController@createProduct');
Route::post('/product/save','ProductController@storeProduct');
Route::get('/product/manage','ProductController@manageProduct');
Route::get('/product/edit/{id}','ProductController@editProduct');
Route::post('/product/update','ProductController@updateProduct');
Route::get('/product/delete/{id}','ProductController@deleteProduct');
Route::get('/product/view/{id}','ProductController@viewProduct');

/* Product Controller Info */


/* Slider Controller Info */

Route::get('/slider/add','SliderController@createSlider');
Route::post('/slider/save','SliderController@storeSlider');
Route::get('/slider/manage','SliderController@manageSlider');
Route::get('/slider/edit/{id}','SliderController@editSlider');
Route::post('/slider/update','SliderController@updateSlider');
Route::get('/slider/delete/{id}','SliderController@deleteSlider');
Route::get('/slider/view/{id}','SliderController@viewSlider');

/* Slider Controller Info */


/* Sub-Slider Controller Info */

Route::get('/sub-slider/add','SubsliderController@createSubslider');
Route::post('/sub-slider/save','SubsliderController@storeSubslider');
Route::get('/sub-slider/manage','SubsliderController@manageSubslider');
Route::get('/sub-slider/edit/{id}','SubsliderController@editSubslider');
Route::post('/sub-slider/update','SubsliderController@updateSubslider');
Route::get('/sub-slider/delete/{id}','SubsliderController@deleteSubslider');
Route::get('/sub-slider/view/{id}','SubsliderController@viewSubslider');

/* Sub-Slider Controller Info */


/* Sub-Category Controller Info */


Route::get('/sub-category/add','SubCategoryController@createSubCategory');
Route::post('/sub-category/save','SubCategoryController@storeSubCategory');
Route::get('/sub-category/manage','SubCategoryController@mangeSubCategory');
Route::get('/sub-category/edit/{id}','SubCategoryController@editSubCategory');
Route::post('/sub-category/update','SubCategoryController@updateSubCategory');
Route::get('/sub-category/delete/{id}','SubCategoryController@SubdeleteCategory');


/* Home Contoller Info */



/* Home Contoller Info */


});

/*==============================   Backend =========================*/