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


Route::get('/analytic','HomeController@analy');

Route::get('/authenticate-user', 'HomeController@loginView')->name('user.login.view');
Route::get('/', 'HomeController@home')->name('user.home');
Route::get('/customer', 'HomeController@welcome')->name('user.welcome');
Route::get('/about-us', 'HomeController@about')->name('user.about');

Route::get('/international-order', 'HomeController@internationalForm')->name('user.int.order');
Route::post('/international-order', 'HomeController@addInternationalShopping')->name('user.int.place');
Route::get('/place-international-order', 'HomeController@placeInternationalOrder')->name('user.int.order.place');

Route::get('/shop', 'HomeController@viewShop')->name('user.shop');
Route::get('/shop-by-category/{category_slug}', 'HomeController@show_product_by_category')->name('user.shop.category');
Route::get('/shop-by-manufacturer/{manufacture_slug}', 'HomeController@show_product_by_manufacture')->name('user.shop.manufacture');
Route::get('/shop-by-online-open-stores/{shop_id}', 'HomeController@show_product_by_shops')->name('user.shop.shop');
Route::get('/product-detail/{slug}', 'HomeController@get_product_details')->name('user.shop.product.detail');
Route::post('/search-results', 'HomeController@searchQuery')->name('user.search');
Route::get('/search-results', 'HomeController@searchQueryResults')->name('user.search');

//========================================== Cart Routes ============================
Route::post('/add-to-cart', 'CartController@add_to_cart')->name('user.shop.add.cart');
Route::get('/show-cart', 'CartController@show_cart')->name('user.shop.show.cart');
Route::get('/delete-item-from-cart/{rowID}', 'CartController@delete_item')->name('user.shop.delete.item');
Route::post('/update-item-from-cart', 'CartController@update_item')->name('user.shop.update.item');
Route::get('/clear-cart/', 'CartController@cart_clear')->name('user.clear.cart');


//============================ Checkout Route =======================
Route::get('/checkout-customer', 'CheckoutController@checkout')->name('user.checkout');
Route::post('/proceed-checkout', 'CheckoutController@createShipping')->name('user.create.shipping');
Route::get('/customer-payment', 'CheckoutController@getPayment')->name('user.payment');
Route::post('/order-place', 'CheckoutController@orderPlace')->name('user.shop.order.place');
Route::get('/confirmation-page', 'CheckoutController@confirmationPage')->name('user.confirm');

//****================ User My Account =================****
Route::get('/my-account/orders', 'HomeController@myAccountOrders')->name('user.account.orders');
Route::get('/my-account/order/{id}/detail', 'HomeController@myAccountOrderDetail')->name('user.account.detail');
Route::get('/my-account/order/{id}/decline', 'HomeController@declineOrder')->name('user.decline.order');
Route::get('/my-account/order/{id}/replace', 'HomeController@replaceOrder')->name('user.replace.order');
Route::get('/my-account/change-password', 'HomeController@changePassword')->name('user.change.password');
Route::post('/my-account/change-password', 'HomeController@configurePassword')->name('user.password.change');
Route::get('/my-account/change-address', 'HomeController@changeAddress')->name('user.change.address');
Route::post('/my-account/change-address', 'HomeController@postAddress')->name('user.post.address');



//============================== Rating and Reviews Routes ====================================
Route::post('/create-a-review','ReviewController@insertReview')->name('user.make.review');

//===================== Ajax added product to cart ====================
Route::post('/ajax-add-to-cart', 'CartController@ajaxAddToCart')->name('user.ajax.add');

Auth::routes();

//===================== Laravel Socialite routes ====================



//=========================== Home Routes ====================================
Route::get('/contact-us', 'HomeController@contact')->name('user.contact');
Route::post('/contact-us', 'HomeController@postContact')->name('user.contact.send');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/privacy-policy', 'HomeController@privacyPolicy')->name('user.privacy');
Route::get('/terms-and-conditions', 'HomeController@termsCondition')->name('user.terms');



//========================= page not found and internal server error routes ==============================
Route::get('/page-not-found','ErrorController@pagenotfound')->name('error.pagenotfound');
Route::get('/internal-server-error','ErrorController@internalServerError')->name('error.internalservererror');



Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

    //======================== Password reset routes ==================================
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    //===================================== Category Routes =====================================
    Route::get('/add-category','Admin\CategoryController@addCategory')->name('admin.add.category');
    Route::get('/view-all-categories','Admin\CategoryController@viewCategory')->name('admin.view.category');
    Route::post('/insert-category','Admin\CategoryController@insertCategory')->name('admin.insert.category');
    Route::get('/active-category/{id}','Admin\CategoryController@activeCategory')->name('admin.active.category');
    Route::get('/unactive-category/{id}','Admin\CategoryController@unactiveCategory')->name('admin.unactive.category');
    Route::get('/edit-category/{id}','Admin\CategoryController@editCategory')->name('admin.edit.category');
    Route::get('/delete-category/{id}','Admin\CategoryController@deleteCategory')->name('admin.delete.category');


    //======================================= Manufacture Routes =========================================
    Route::get('/add-manufacture','Admin\ManufactureController@addManufacture')->name('admin.add.manufacture');
    Route::get('/view-all-manufacturers','Admin\ManufactureController@viewManufacture')->name('admin.view.manufacture');
    Route::post('/insert-manufacture','Admin\ManufactureController@insertManufacture')->name('admin.insert.manufacture');
    Route::get('/active-manufacture/{id}','Admin\ManufactureController@activeManufacture')->name('admin.active.manufacture');
    Route::get('/unactive-manufacture/{id}','Admin\ManufactureController@unactiveManufacture')->name('admin.unactive.manufacture');
    Route::get('/edit-manufacture/{id}','Admin\ManufactureController@editManufacture')->name('admin.edit.manufacture');
    Route::post('/update-manufacture','Admin\ManufactureController@updateManufacture')->name('admin.update.manufacture');
    Route::get('/delete-manufacture/{id}','Admin\ManufactureController@deleteManufacture')->name('admin.delete.manufacture');


    //====================================== Product Routes ===============================================
    Route::get('/add-product','Admin\ProductController@addProduct')->name('admin.add.product');
    Route::get('/view-all-products','Admin\ProductController@viewProduct')->name('admin.view.product');
    Route::post('/insert-product','Admin\ProductController@insertProduct')->name('admin.insert.product');
    Route::get('/active-product/{id}','Admin\ProductController@activeProduct')->name('admin.active.product');
    Route::get('/unactive-product/{id}','Admin\ProductController@unactiveProduct')->name('admin.unactive.product');
    Route::get('/delete-product/{id}','Admin\ProductController@deleteProduct')->name('admin.delete.product');
    Route::get('/active-stock/{id}','Admin\ProductController@activeStock')->name('admin.active.stock');
    Route::get('/unactive-stock/{id}','Admin\ProductController@unactiveStock')->name('admin.unactive.stock');
    Route::get('/edit-product/{id}','Admin\ProductController@editProduct')->name('admin.edit.product');
    Route::post('/update-product','Admin\ProductController@updateProduct')->name('admin.update.product');
    Route::post('/add-more-product-images','Admin\ProductController@addMoreImages')->name('admin.add.more.images');
    Route::get('/delete-product-image/{id}','Admin\ProductController@deleteProductImage')->name('admin.delete.image');


    //============================================ Slider Routes =================================================
    Route::get('/add-slider','Admin\SliderController@addSlider')->name('admin.add.slider');
    Route::get('/view-all-sliders','Admin\SliderController@viewSlider')->name('admin.view.slider');
    Route::post('/insert-slider','Admin\SliderController@insertSlider')->name('admin.insert.slider');
    Route::get('/active-slider/{id}','Admin\SliderController@activeSlider')->name('admin.active.slider');
    Route::get('/unactive-slider/{id}','Admin\SliderController@unactiveSlider')->name('admin.unactive.slider');
    Route::get('/delete-slider/{id}','Admin\SliderController@deleteSlider')->name('admin.delete.slider');


    //=========================================== Orders Routes ===============================================
    Route::get('/manage-orders','Admin\OrdersController@manageOrders')->name('admin.view.orders');
    Route::get('/manage-international-orders','Admin\OrdersController@manageOrdersInt')->name('admin.view.orders.int');
    Route::get('/view-order-details/{order_details_id}','Admin\OrdersController@viewOrder')->name('admin.view.order.detail');
    Route::get('/view-order-details-international/{code}','Admin\OrdersController@viewOrderInt')->name('admin.view.order.detail.int');
    Route::get('/order-successfully-delivered/{id}','Admin\OrdersController@activeOrder')->name('admin.active.order');
    Route::get('/order-not-delivered/{id}','Admin\OrdersController@unactiveOrder')->name('admin.unactive.order');
    Route::get('/order-confirm/{id}','Admin\OrdersController@confirmOrder')->name('admin.order.confirm');
    Route::get('/order-declined/{id}','Admin\OrdersController@declineOrder')->name('admin.order.decline');
    Route::get('/order-payment-successful/{id}','Admin\OrdersController@paymentActive')->name('admin.payment.active');
    Route::get('/order-payment-unsuccessful/{id}','Admin\OrdersController@paymentUnActive')->name('admin.payment.unactive');



    //======================================= Admin Routes ========================================
    Route::get('/register-an-administrator','AdminController@addAdmin')->name('admin.add.admin');
    Route::get('/view-all-administrators','AdminController@getAdmins')->name('admin.view.admin');
    Route::get('/change-password/{id}','AdminController@getChangePassword')->name('admin.edit.admin');
    Route::post('/register-admin','AdminController@insertAdmin')->name('admin.insert.admin');
    Route::get('/delete-admin/{id}','AdminController@deleteAdmin')->name('admin.delete.admin');
    Route::post('/change-admin','AdminController@changePassword')->name('admin.change.password');


    //================================= Logs Routes =====================================
    Route::get('/view-order-logs','Admin\LogController@orderLogs')->name('admin.view.order.log');
    Route::get('/view-product-logs','Admin\LogController@productLogs')->name('admin.view.product.log');
    Route::get('/view-visitor-logs','Admin\LogController@VisitorLogs')->name('admin.view.visitor.log');


    //=========================== Receipt Routes =================================
    Route::get('/view-invoice/{id}','Admin\ReceiptController@viewInvoice')->name('admin.view.invoice');
    // ============= This is the end of the receipt routes ===========================

});
