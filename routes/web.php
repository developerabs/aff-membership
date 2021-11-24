<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServicePageSideIconController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\HomeContentController;
use App\Http\Controllers\Admin\HomeContentGerWorkController;
use App\Http\Controllers\Admin\PackageCategoryController;
use App\Http\Controllers\Admin\PackageFeaturesController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\HowItWorkController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\PaymentMethodsController;
use App\Http\Controllers\Admin\OrderDetailsController;
use App\Http\Controllers\Admin\PaymentGetwayController;
use App\Http\Controllers\Admin\SmtpController;


// frontend controllers
use App\Http\Controllers\HomeController; 

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

// frontend routes 

Route::get('/',[HomeController::class, 'home'])->name('home');


//pages routes
 

//service order and paymenr gerway routes
// Route::get('order-now/{id}',[OrderController::class, 'serviceOrder'])->name('page.serviceOrder');
// Route::post('checkout',[OrderController::class, 'serviceCheckout'])->name('page.serviceCheckout');



Route::group(['middleware'=>'auth'],function(){
    //order details
    Route::get('service-order-details/{id}', [PagesController::class, 'serviceOrderDetails'])->name('page.serviceDetails');
    Route::get('package-order-details/{id}', [PagesController::class, 'packageDetails'])->name('page.packageDetails');
    //service order and paymenr gerway routes
    Route::get('service-order/{id}',[OrderController::class, 'serviceOrder'])->name('page.serviceOrder');
    Route::post('checkout',[OrderController::class, 'serviceCheckout'])->name('page.serviceCheckout');
    //package order
    Route::get('package-order/{id}',[OrderController::class, 'packageOrder'])->name('page.packageOrder');
    //payment routes 
    Route::get('/paywithpaypal',[PaypalController::class, 'payWithPaypal'])->name('paywithpaypal');
    Route::post('/paypal',[PaypalController::class, 'postPaymentWithpaypal'])->name('paypal');
    Route::get('/paypal',[PaypalController::class, 'getPaymentStatus'])->name('status');
    //stripe payment method 
    Route::get('stripe', [PaypalController::class, 'stripe']);
    Route::post('stripe', [PaypalController::class, 'stripePost'])->name('stripe.post');
    //payment success
    Route::get('payment-success', [PaypalController::class, 'paymentSuccessStripe'])->name('paymentSuccessStripe');

    
    //my account page
    Route::get('my-account',[PagesController::class, 'myAccount'])->name('page.myAccount');
    //profile manage 
    Route::get('manage-profile', [UserController::class, 'manageProfile'])->name('page.manageProfile');
    Route::post('update-profile', [UserController::class, 'updateProfile'])->name('updateProfile');
    //order print
    Route::get('serviceOrderPrint/{id}', [OrderDetailsController::class, 'servicePrint'])->name('admin.servicePrint');
    Route::get('packageOrderPrint/{id}', [OrderDetailsController::class, 'packagePrint'])->name('admin.packagePrint');

});







// admin routes


Route::group(['middleware'=>'isAdmin'],function(){
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
    //categories route 
    Route::prefix('categories')->group(function(){
        Route::get('view',[CategoryController::class, 'index'])->name('categories.view');
        Route::get('add',[CategoryController::class, 'add'])->name('categories.add');
        Route::post('store',[CategoryController::class, 'store'])->name('categories.store');
        Route::get('edit/{id}',[CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('update/{id}',[CategoryController::class, 'update'])->name('categories.update');
        Route::get('delete/{id}',[CategoryController::class, 'delete'])->name('categories.delete');
        Route::get('popular/{id}',[CategoryController::class, 'popular'])->name('categories.popular');
    });
    // service route
    Route::prefix('services')->group(function(){
        Route::get('view',[ServiceController::class, 'index'])->name('services.view');
        Route::get('add',[ServiceController::class, 'add'])->name('services.add');
        Route::post('store',[ServiceController::class, 'store'])->name('services.store');
        Route::get('edit/{id}',[ServiceController::class, 'edit'])->name('services.edit');
        Route::post('update/{id}',[ServiceController::class, 'update'])->name('services.update');
        Route::get('delete/{id}',[ServiceController::class, 'delete'])->name('services.delete');
        Route::get('active-inactiva/{id}',[ServiceController::class, 'activeInactive'])->name('services.activeInactive');
    });
    // service page side icon route
    Route::prefix('servicesPageSideIcon')->group(function(){
        Route::get('view',[ServicePageSideIconController::class, 'index'])->name('servicesPageSideIcon.view');
        Route::get('add',[ServicePageSideIconController::class, 'add'])->name('servicesPageSideIcon.add');
        Route::post('store',[ServicePageSideIconController::class, 'store'])->name('servicesPageSideIcon.store');
        Route::get('edit/{id}',[ServicePageSideIconController::class, 'edit'])->name('servicesPageSideIcon.edit');
        Route::post('update/{id}',[ServicePageSideIconController::class, 'update'])->name('servicesPageSideIcon.update');
        Route::get('delete/{id}',[ServicePageSideIconController::class, 'delete'])->name('servicesPageSideIcon.delete'); 
    });
    // customers route
    Route::prefix('customers')->group(function(){
        Route::get('view',[CustomersController::class, 'index'])->name('customers.view'); 
        Route::get('suspend-unsuspend/{id}',[CustomersController::class, 'suspendUnsuspend'])->name('customers.suspendUnsuspend'); 
    });
    // orders route
    Route::prefix('orders')->group(function(){
        Route::get('view',[OrdersController::class, 'index'])->name('orders.view'); 
        Route::get('delete/{id}',[OrdersController::class, 'delete'])->name('orders.delete'); 
        Route::get('active-inactiva/{id}',[OrdersController::class, 'activeInactive'])->name('orders.activeInactive');
    });
    // package category route
    Route::prefix('packagecategory')->group(function(){
       Route::get('view',[PackageCategoryController::class, 'index'])->name('packagecategory.view');
       Route::get('add',[PackageCategoryController::class, 'add'])->name('packagecategory.add');
       Route::post('store',[PackageCategoryController::class, 'store'])->name('packagecategory.store');
       Route::get('edit/{id}',[PackageCategoryController::class, 'edit'])->name('packagecategory.edit');
       Route::post('update/{id}',[PackageCategoryController::class, 'update'])->name('packagecategory.update');
       Route::get('delete/{id}',[PackageCategoryController::class, 'delete'])->name('packagecategory.delete'); 
   });
    // package feature route
    Route::prefix('packagefeature')->group(function(){
       Route::get('view/{id}',[PackageFeaturesController::class, 'index'])->name('packagefeature.view');
       Route::get('add',[PackageFeaturesController::class, 'add'])->name('packagefeature.add');
       Route::post('store',[PackageFeaturesController::class, 'store'])->name('packagefeature.store');
       Route::get('edit/{cat_id}/{id}',[PackageFeaturesController::class, 'edit'])->name('packagefeature.edit');
       Route::post('update/{id}',[PackageFeaturesController::class, 'update'])->name('packagefeature.update');
       Route::get('delete/{id}',[PackageFeaturesController::class, 'delete'])->name('packagefeature.delete'); 
   });
     // blog category route
     Route::prefix('blogcategory')->group(function(){
        Route::get('view',[BlogCategoryController::class, 'index'])->name('blogcategory.view');
        Route::get('add',[BlogCategoryController::class, 'add'])->name('blogcategory.add');
        Route::post('store',[BlogCategoryController::class, 'store'])->name('blogcategory.store');
        Route::get('edit/{id}',[BlogCategoryController::class, 'edit'])->name('blogcategory.edit');
        Route::post('update/{id}',[BlogCategoryController::class, 'update'])->name('blogcategory.update');
        Route::get('delete/{id}',[BlogCategoryController::class, 'delete'])->name('blogcategory.delete'); 
    });
     // blog route
     Route::prefix('blog')->group(function(){
        Route::get('view',[BlogController::class, 'index'])->name('blog.view');
        Route::get('add',[BlogController::class, 'add'])->name('blog.add');
        Route::post('store',[BlogController::class, 'store'])->name('blog.store');
        Route::get('edit/{id}',[BlogController::class, 'edit'])->name('blog.edit');
        Route::post('update/{id}',[BlogController::class, 'update'])->name('blog.update');
        Route::get('delete/{id}',[BlogController::class, 'delete'])->name('blog.delete'); 
    });

    //pages content routes 
    //home page content routes
    //home page banner content routes
    Route::prefix('homeContentBanner')->group(function(){
        Route::get('view',[HomeContentController::class, 'homeContentBannerIndex'])->name('homeContentBanner.view');  
        Route::post('update',[HomeContentController::class, 'homeContentBannerUpdate'])->name('homeContentBanner.update'); 
    });
     // blog route
    Route::prefix('homeContentGetWork')->group(function(){
        Route::get('view',[HomeContentGerWorkController::class, 'index'])->name('homeContentGetWork.view');
        Route::get('add',[HomeContentGerWorkController::class, 'add'])->name('homeContentGetWork.add');
        Route::post('store',[HomeContentGerWorkController::class, 'store'])->name('homeContentGetWork.store');
        Route::get('edit/{id}',[HomeContentGerWorkController::class, 'edit'])->name('homeContentGetWork.edit');
        Route::post('update/{id}',[HomeContentGerWorkController::class, 'update'])->name('homeContentGetWork.update');
        Route::get('delete/{id}',[HomeContentGerWorkController::class, 'delete'])->name('homeContentGetWork.delete'); 
    });
     //home page money protection content routes
    Route::prefix('moneyprotection')->group(function(){
        Route::get('view',[HomeContentController::class, 'moneyprotectionIndex'])->name('moneyprotection.view');  
        Route::post('update',[HomeContentController::class, 'moneyprotectionUpdate'])->name('moneyprotection.update'); 
    });
     //home page find your target content routes
    Route::prefix('findyourtarget')->group(function(){
        Route::get('view',[HomeContentController::class, 'findyourtargetIndex'])->name('findyourtarget.view');  
        Route::post('update',[HomeContentController::class, 'findyourtargetUpdate'])->name('findyourtarget.update'); 
    });
    //about page route 
    Route::prefix('aboutus')->group(function(){
        Route::get('view',[AboutPageController::class, 'aboutusIndex'])->name('aboutus.view');  
        Route::post('update',[AboutPageController::class, 'aboutusUpdate'])->name('aboutus.update'); 
    });
    //how is work page route 
    Route::prefix('howItWork')->group(function(){
        Route::get('view',[HowItWorkController::class, 'howItWorkIndex'])->name('howItWork.view');  
        Route::post('update',[HowItWorkController::class, 'howItWorkUpdate'])->name('howItWork.update'); 
    });
    //faq page route 
    Route::prefix('faqPage')->group(function(){
        Route::get('view',[FaqController::class, 'faqPageIndex'])->name('faqPage.view');  
        Route::post('update',[FaqController::class, 'faqPageUpdate'])->name('faqPage.update'); 
    });
    //privacy policy page route 
    Route::prefix('privacyPolicy')->group(function(){
        Route::get('view',[PrivacyPolicyController::class, 'privacyPolicyIndex'])->name('privacyPolicy.view');  
        Route::post('update',[PrivacyPolicyController::class, 'privacyPolicyUpdate'])->name('privacyPolicy.update'); 
    });
     //site settings content routes
    Route::prefix('sitesettings')->group(function(){
        Route::get('view',[HomeContentController::class, 'sitesettingsIndex'])->name('sitesettings.view');  
        Route::post('update',[HomeContentController::class, 'sitesettingsUpdate'])->name('sitesettings.update'); 
    });
     // payment method route
    Route::prefix('paymentMethods')->group(function(){
        Route::get('view',[PaymentMethodsController::class, 'index'])->name('paymentMethods.view');
        Route::get('add',[PaymentMethodsController::class, 'add'])->name('paymentMethods.add');
        Route::post('store',[PaymentMethodsController::class, 'store'])->name('paymentMethods.store');
        Route::get('edit/{id}',[PaymentMethodsController::class, 'edit'])->name('paymentMethods.edit');
        Route::post('update/{id}',[PaymentMethodsController::class, 'update'])->name('paymentMethods.update');
        Route::get('delete/{id}',[PaymentMethodsController::class, 'delete'])->name('paymentMethods.delete'); 
    });

       //order details
       Route::get('serviceOrderDetails/{id}', [OrderDetailsController::class, 'serviceOrderDetails'])->name('admin.serviceDetails');
       Route::get('packageOrderDetails/{id}', [OrderDetailsController::class, 'packageDetails'])->name('admin.packageDetails');

       //payment methods 
    Route::prefix('paymentGetway')->group(function(){
        Route::get('view', [PaymentGetwayController::class, 'view'])->name('paymentGetway.view');
        Route::post('paypalGetwayUpdate', [PaymentGetwayController::class, 'paypalGetwayUpdate'])->name('paypalGetway.update');
        Route::post('stripeGetwayUpdate', [PaymentGetwayController::class, 'stripeGetwayUpdate'])->name('strypeGetway.update');
    });
    //smtp routes
    Route::prefix('smtp')->group(function(){
        Route::get('view', [SmtpController::class, 'view'])->name('smtp.view'); 
        Route::post('update', [SmtpController::class, 'update'])->name('smtp.update'); 
    });
       
 
        

});

Route::get('config', function () {
    return config('app.PaypalGetway');
});



Route::any('{all}',[HomeController::class, 'home'])->where('all', '(.*)');



 
