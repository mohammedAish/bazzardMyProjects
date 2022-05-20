<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Front\EcommerceController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\ContactUsEcommerceController;
use App\Http\Controllers\PaymentController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session ;
use Illuminate\Http\Request;

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


// Route::domain('{store}.bazaard.com')
//     ->middleware('store')
//     ->group(function () {
//     Route::get('/',[EcommerceController::class,'indexecommerce'])->name('home');
//     Route::get('/products',[EcommerceController::class,'indexecommerce1_products'])->name('home1_products');
//     Route::get('/products/{name}',[EcommerceController::class,'indexecommerce1_products_detail'])->name('home1_products_detail');

// });


Route::get('/policy',[FrontController::class,'policy'])->name('policy');
Route::get('/terms',[FrontController::class,'terms'])->name('terms');

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function () {
Route:: /*domain('{store}.localhost')*/
    group(['prefix' =>'store/{store}', 'middleware' => 'store'], function () {
    Route::get('/',[EcommerceController::class,'index'])->name('home');
    Route::get('/categories/{name}/products',[EcommerceController::class,'products'])->name('products');
    Route::get('/product/{name}',[EcommerceController::class,'products_detail'])->name('product_details');
    Route::get('/products_color/{id}/{value}',[EcommerceController::class,'products_detail_color'])->name('products_detail_color');
    Route::get('/pages/{page_name}',[EcommerceController::class,'pages'])->name('pages');
    Route::get('/products',[EcommerceController::class,'allproducts'])->name('allproducts');



    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    Route::post('/cart/store',[CartController::class,'store'])->name('cart.store');
    Route::delete('cart/{id}',[CartController::class,'destroy'])->name('cart.destroy');
    Route::get('/checkOut',[CartController::class,'checkOut'])->name('cart.checkOut');
    Route::post('/checkOut_store',[CartController::class,'checkOut_store'])->name('cart.checkOut_store');


});
});

Route::post('/contactus/store',[ContactUSController::class,'store'])->name('contactus.store');

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::get('/',[FrontController::class,'index'])->name('index');
    Route::get('/price',[FrontController::class,'price'])->name('price');
    Route::get('/contact',[FrontController::class,'contact'])->name('contact');

    Route::post('/ecommerce/contactus/store',[ContactUsEcommerceController::class,'store'])->name('ecommerce_contactus.store');






    Route::post('register/validate',[FrontController::class,'validateRegistration'])->name('register.validate');
    Route::get('register/real_time_validate/{slug}',[FrontController::class,'RealTimeValidate'])->name('register.real_time_validate');
    Route::get('checkout/fetch_date/{phone}',[EcommerceController::class,'CheckoutFetchData'])->name('checkout.fetch_data');


    Route::get('/store-style',[EcommerceController::class,'themeindex'])->middleware(['auth'])->name('themes');
    Route::post('/store-style',[EcommerceController::class,'themestore'])->middleware(['auth'])->name('themes_store');

    Route::get('/reports',[DashboardController::class,'reports'])->middleware(['auth'])->name('reports.index');


    Route::get('dashboard','DashboardController@index')->middleware(['auth'])->name('dashboard');
    Route::get('mystores','DashboardController@mystores')->middleware(['auth'])->name('dashboard_store');

    Route::get('mystores/{user}','DashboardController@mystores')->middleware(['auth'])->name('mystores');
    Route::get('newstore/{user}','DashboardController@newstore')->middleware(['auth'])->name('newstore');
    Route::post('newstore/{user}','DashboardController@createnewstore')->middleware(['auth'])->name('creatnewstore');


    // Route::get('mystore/{slug}','MyStoresController@index')->middleware(['auth'])->name('mystore.index');

    Route::get('mystore/{slug}/profile','MyStoresController@profile')->middleware(['auth'])->name('mystore.profile');
    Route::post('mtstore/{slug}/profilestore','MyStoresController@profilestore')->middleware(['auth'])->name('profile.mystore');





    Route::get('profile','UserController@profile')->middleware(['auth'])->name('profile.edite');
    Route::post('profile/{id}','UserController@profilestore')->middleware(['auth'])->name('profile.store');

    Route::get('password','UserController@password')->middleware(['auth'])->name('password.edite');
    Route::post('password/{id}','UserController@changepassword')->middleware(['auth'])->name('password.store');


    Route::middleware(['auth'])->group(function () {

    Route::get('/currently_sells','CurrentlySellController@index')->name('currently_sells.index');
    Route::get('/currently_sells/create','CurrentlySellController@create')->name('currently_sells.create');
    Route::post('currently_sells/','CurrentlySellController@store')->name('currently_sells.store');
    Route::get('currently_sells/{id}/edit','CurrentlySellController@edit')->name('currently_sells.edit');
    Route::put('currently_sells/{id}','CurrentlySellController@update')->name('currently_sells.update');
    Route::delete('currently_sells/{id}','CurrentlySellController@destroy')->name('currently_sells.destroy');

    Route::get('/sales_categories','SalesCategoriesController@index')->name('sales_categories.index');
    Route::get('/sales_categories/create','SalesCategoriesController@create')->name('sales_categories.create');
    Route::post('sales_categories/','SalesCategoriesController@store')->name('sales_categories.store');
    Route::get('sales_categories/{id}/edit','SalesCategoriesController@edit')->name('sales_categories.edit');
    Route::put('sales_categories/{id}','SalesCategoriesController@update')->name('sales_categories.update');
    Route::delete('sales_categories/{id}','SalesCategoriesController@destroy')->name('sales_categories.destroy');


    Route::get('/contact_us',[ContactUSController::class,'index'])->name('contactus.index');
    Route::get('/contact_us/{id}',[ContactUSController::class,'show'])->name('contactus.show');
    Route::delete('contactus/{id}',[ContactUSController::class,'destroy'])->name('contactus.destroy');

    Route::get('/ecommerce/contact_us',[ContactUsEcommerceController::class,'index'])->name('ecommerce_contactus.index');
    Route::get('/ecommerce/contact_us/{id}',[ContactUsEcommerceController::class,'show'])->name('ecommerce_contactus.show');
    Route::delete('/ecommerce/contactus/{id}',[ContactUsEcommerceController::class,'destroy'])->name('ecommerce_contactus.destroy');


    Route::get('/merchants','MerchantController@index')->name('merchants.index');
    Route::get('/merchants/create','MerchantController@create')->name('merchants.create');
    Route::get('merchants/{id}','MerchantController@show')->name('merchants.show');
    Route::post('merchants/','MerchantController@store')->name('merchants.store');
    Route::get('merchants/{id}/edit','MerchantController@edit')->name('merchants.edit');
    Route::put('merchants/{id}','MerchantController@update')->name('merchants.update');
    Route::delete('merchants/{id}', 'MerchantController@destroy')->name('merchants.destroy');
    Route::get('merchants/status/{id}','MerchantController@status')->name('merchants.status');


    Route::get('/admins','AdminController@index')->name('admins.index');
    Route::get('/admins/create','AdminController@create')->name('admins.create');
    Route::get('admins/{id}', 'AdminController@show')->name('admins.show');
    Route::post('admins/','AdminController@store')->name('admins.store');
    Route::get('admins/{id}/edit','AdminController@edit')->name('admins.edit');
    Route::put('admins/{id}','AdminController@update')->name('admins.update');
    Route::delete('admins/{id}', 'AdminController@destroy')->name('admins.destroy');
    Route::get('admins/status/{id}','AdminController@status')->name('admins.status');


    Route::get('/roles',[RolesController::class,'index'])->name('roles.index');
    //Route::get('/roles/create',[RolesController::class,'create'])->name('roles.create');
    Route::get('roles/{id}', [RolesController::class,'show'])->name('roles.show');
    Route::post('roles/', [RolesController::class, 'store'])->name('roles.store');
    Route::get('roles/{id}/edit', [RolesController::class, 'edit'])->name('roles.edit');
    Route::put('roles/{id}', [RolesController::class, 'update'])->name('roles.update');
    Route::delete('roles/{id}', [RolesController::class, 'destroy'])->name('roles.destroy');


    Route::get('/users','UserController@index')->name('users.index');
    Route::get('/users/create','UserController@create')->name('users.create');
    Route::get('roles/{id}','UserController@show')->name('users.show');
    Route::post('users/','UserController@store')->name('users.store');
    Route::get('users/{id}/edit','UserController@edit')->name('users.edit');
    Route::put('users/{id}','UserController@update')->name('users.update');
    Route::delete('users/{id}','UserController@destroy')->name('users.destroy');
    Route::get('users/{id}/roles','UserController@roles')->name('users.roles');
    Route::post('users/{id}/roles','UserController@rolesstore')->name('users.rolesstore');


    Route::get('/products',[ProductController::class,'index'])->name('products.index');
    Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
    Route::get('products/{id}',[ProductController::class,'show'])->name('products.show');
    Route::post('products/',[ProductController::class, 'store'])->name('products.store');
    Route::get('products/{id}/edit',[ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{id}',[ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{id}',[ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('products/status/{id}',[ProductController::class, 'status'])->name('products.status');
    Route::post('products/variant/{id}',[ProductController::class, 'addVariant'])->name('add.variant');

    Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
    Route::get('categories/{id}',[CategoryController::class,'show'])->name('categories.show');
    Route::post('categories/',[CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{id}/edit',[CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{id}',[CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{id}',[CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('categories/status/{id}',[CategoryController::class, 'status'])->name('categories.status');


    Route::get('/orders1',[OrderController::class,'index1'])->name('orders.index');
    Route::get('orders1/{id}',[OrderController::class,'show'])->name('orders.show');
    Route::post('orders1/{id}/confirm',[OrderController::class,'confirmedOrder'])->name('orders.confirm');
   Route::post('orders1/{id}/deliver',[OrderController::class,'deliverOrder'])->name('orders.in_deliver');
   //Route::post('orders1/deliver',[OrderController::class,'deliverOrder'])->name('orders.in_deliver');

   Route::post('orders1/{id}/cancel',[OrderController::class,'canceledOrder'])->name('orders.cancel');

    Route::get('/orders',[OrderController::class,'index'])->name('systemOrders.index');
    Route::get('/orders/create',[OrderController::class,'create'])->name('systemOrders.create');
    Route::post('orders/',[OrderController::class, 'store'])->name('systemOrders.store');
    Route::get('orders/{id}/edit',[OrderController::class, 'edit'])->name('systemOrders.edit');
    Route::put('orders/{id}',[OrderController::class, 'update'])->name('systemOrders.update');
    Route::delete('orders/{id}',[OrderController::class, 'destroy'])->name('systemOrders.destroy');
    Route::get('orders/{id}/',[OrderController::class, 'getproduct'])->name('order_product');
    Route::get('/products_ordere_color/{id}/{value}',[OrderController::class,'products_ordere_color'])->name('products_ordere_color');

    Route::get('/customers',[CustomerController::class,'index'])->name('customers.index');
    Route::get('/customers/create',[CustomerController::class,'create'])->name('customers.create');
    Route::get('customers/{id}',[CustomerController::class,'show'])->name('customers.show');
    Route::post('customers/',[CustomerController::class, 'store'])->name('customers.store');
    Route::get('customers/{id}/edit',[CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('customers/{id}',[CustomerController::class, 'update'])->name('customers.update');
    Route::delete('customers/{id}',[CustomerController::class, 'destroy'])->name('customers.destroy');

    Route::get('/pages','PagesController@index')->name('pages.index');
    Route::get('/pages_edit/{key_page}','PagesController@update')->name('page.edit');
    Route::post('/pages_store/{key_page}','PagesController@store')->name('page.store');
    Route::get('pages/status/{id}','PagesController@status')->name('page.status');

    Route::get('/Companies',[CompanyController::class,'index'])->name('company.index');
    Route::get('/Companies/create',[CompanyController::class,'create'])->name('company.create');
    Route::post('Companies',[CompanyController::class, 'store'])->name('company.store');
    Route::get('Company/{id}/edit',[CompanyController::class, 'edit'])->name('company.edit');
    Route::put('Company/{id}',[CompanyController::class, 'update'])->name('company.update');
    Route::delete('Company/{id}',[CompanyController::class, 'destroy'])->name('company.destroy');

    Route::get('getcompanies/{slug}',[CompanyController::class,'company'])->name('companies.show');
    Route::post('getcompanies/{slug}',[CompanyController::class,'storeCompany'])->name('companies.store_company');



});

Route::get('/payment/{price}',[PaymentController::class,'index'])->name('payment');

    require __DIR__.'/auth.php';
});
