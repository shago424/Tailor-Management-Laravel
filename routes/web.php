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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'admin','middleware'=>['admin','auth'],'namespace'=>'admin'],function(){ 
	Route::get('dashboard','AdminController@index')->name('admin.dashboard');

});

Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){ 
	Route::get('dashboard','UserController@index')->name('user.dashboard');

});


Route::group(['middleware'=>'auth'],function(){
//========Users============

	Route::prefix('users')->group(function(){
	Route::get('/view','backend\UserController@view')->name('users.view');
	Route::get('/add','backend\UserController@add')->name('users.add');
	Route::post('/store','backend\UserController@store')->name('users.store');
	Route::get('/edit/{id}','backend\UserController@edit')->name('users.edit');
	Route::post('/update/{id}','backend\UserController@update')->name('users.update');
	Route::get('/delete/{id}','backend\UserController@delete')->name('users.delete');

});

	Route::prefix('profiles')->group(function(){
	Route::get('/view','backend\ProfileController@view')->name('profiles.view');
	Route::get('/edit','backend\ProfileController@edit')->name('profiles.edit');
	Route::post('/store','backend\ProfileController@update')->name('profiles.update');
	Route::get('/password/view','backend\ProfileController@passwordview')->name('profiles.password.view');
	Route::post('/password/update','backend\ProfileController@passwordupdate')->name('profiles.password.update');
});



		//========Customers============

	Route::prefix('customers')->group(function(){
	Route::get('/view','backend\CustomerController@view')->name('customers.view');
	Route::get('/due-customer/view','backend\CustomerController@duecustomer')->name('customers.due-customer-view');
	Route::get('/add','backend\CustomerController@add')->name('customers.add');
	Route::post('/store','backend\CustomerController@store')->name('customers.store');
	Route::get('/edit/{id}','backend\CustomerController@edit')->name('customers.edit');
	Route::post('/update/{id}','backend\CustomerController@update')->name('customers.update');
	Route::get('/delete/{id}','backend\CustomerController@delete')->name('customers.delete');
	//========Customer Credit Or due============
	Route::get('/credit/customer','backend\CustomerController@creditcustomer')->name('customers.credit');
	Route::get('/credit/customer/pdf','backend\CustomerController@creditcustomerpdf')->name('customers.credit-pdf');
	Route::get('/invoice/customer/edit/{id}','backend\CustomerController@invoicecustomeredit')->name('customers.invoice-edit');
	Route::get('/invoice/customer/payment/edit/{invoice_id}','backend\CustomerController@paymentcustomeredit')->name('customers.invoice-payment-edit');
	Route::post('/invoice/customer/update/{invoice_id}','backend\CustomerController@invoicecustomerupdate')->name('customers.invoice-update');
	Route::get('/invoice/customer/details-pdf/{invoice_id}','backend\CustomerController@invoicecustomerdetailspdf')->name('customers.invoice-details-pdf');

	//========PAID Customer ============
	Route::get('/paid/customer','backend\CustomerController@paidcustomer')->name('customers.paid');
	Route::get('/paid/customer/pdf','backend\CustomerController@paidcustomerpdf')->name('customers.paid-pdf');
	Route::get('/invoice/paid/customer/details-pdf/{invoice_id}','backend\CustomerController@invoicecPaidustomerdetailspdf')->name('customers.paid-invoice-details-pdf');

	Route::get('/customer/wise/report','backend\CustomerController@customerwisereport')->name('customers.wise-report');
	Route::get('/customer/wise/product/report','backend\CustomerController@customerwiseProductreport')->name('customers.wise-product-report');
	Route::get('/customer/wise/credit/report','backend\CustomerController@customerwisecreditreport')->name('customers.wise-credit-report');
	Route::get('/customer/wise/paid/report','backend\CustomerController@customerwisepaidreport')->name('customers.wise-paid-report');

});

	// Tailor
Route::prefix('tailors')->group(function(){
	Route::get('/view','backend\TailorController@view')->name('tailors.view');
	Route::get('/add','backend\TailorController@add')->name('tailors.add');
	Route::post('/store','backend\TailorController@store')->name('tailors.store');
	Route::get('/edit/{id}','backend\TailorController@edit')->name('tailors.edit');
	Route::post('/update/{id}','backend\TailorController@update')->name('tailors.update');
	Route::get('/delete/{id}','backend\TailorController@delete')->name('tailors.delete');
	Route::get('/tailor/inactive{id}','backend\TailorController@inactive')->name('tailors.inactive');
Route::get('/tailor/active{id}','backend\TailorController@active')->name('tailors.active');

// Tailor Report
Route::get('/tailor/wise-report-view','backend\TailorController@tailorwisereportview')->name('tailors.tailor-wise-view');
Route::get('/tailor/wise-detailis-report','backend\TailorController@tailorwisedeatilsreport')->name('tailors.wise-report');
Route::get('/tailor/wise-detailis-report-pdf','backend\TailorController@tailorwisedeatilsreportpdf')->name('tailors.wise-details-report-pdf');
Route::get('/admin/wise-detailis-report','backend\TailorController@adminwiseport')->name('tailors.admin-wise-report');
Route::get('/admin/wise-detailis-report-pdf','backend\TailorController@adminwiseportpdf')->name('tailors.admin-wise-report-pdf');
// Date Wise
Route::get('/tailor/date-wise-report-view','backend\TailorController@tailordatewisereportview')->name('tailors.tailor-date-wise-view');
Route::get('/tailor/date-wise-detailis-report','backend\TailorController@tailordatewisedeatilsreport')->name('tailors.date-details-wise-report');
Route::get('/tailor/date-wise-detailis-report-pdf','backend\TailorController@tailordatewisedeatilsreportpdf')->name('tailors.date-details-wise-report-pdf');




});

	// Tailor Payments
Route::prefix('tailorpayments')->group(function(){
	Route::get('/vtailor/payment/view','backend\TailorPaymentController@view')->name('tailorpayments.view');
	Route::get('/tailor/payment/add','backend\TailorPaymentController@add')->name('tailorpayments.add');
	Route::post('/tailor/payment/store','backend\TailorPaymentController@store')->name('tailorpayments.store');
	Route::get('/tailor/payment/edit/{id}','backend\TailorPaymentController@edit')->name('tailorpayments.edit');
	Route::post('/tailor/payment/update/{id}','backend\TailorPaymentController@update')->name('tailorpayments.update');
	Route::get('/tailor/payment/delete/{id}','backend\TailorPaymentController@delete')->name('tailorpayments.delete');
	Route::get('/tailor/payment/tailor/inactive{id}','backend\TailorPaymentController@inactive')->name('tailorpayments.inactive');
Route::get('/tailor/payment/tailor/active{id}','backend\TailorPaymentController@active')->name('tailorpayments.active');
// payment Report
Route::get('/tailor/payment/tailor-wise-view-payment','backend\TailorPaymentController@tailorwiseviewpayment')->name('tailorpayments.tailor-wise-view-payment');
Route::get('/tailor/payment/tailor-wise-payment-report','backend\TailorPaymentController@tailorwisepaymentreport')->name('tailorpayments.tailor-wise-payment-report');
Route::get('/tailor/payment/tailor-wise-payment-report-pdf','backend\TailorPaymentController@tailorwisepaymentreportpdf')->name('tailorpayments.tailor-wise-payment-report-pdf');

Route::get('/admin/payment/admin-wise-payment-report','backend\TailorPaymentController@adminwisepaymentreport')->name('tailorpayments.admin-wise-payment-report');
Route::get('/admin/payment/admin-wise-payment-report-pdf','backend\TailorPaymentController@adminwisepaymentreportpdf')->name('tailorpayments.admin-wise-payment-report-pdf');

//date wise payment Report
Route::get('/tailor/payment/tailor-date-wise-view-payment','backend\TailorPaymentController@tailordatewiseviewpayment')->name('tailorpayments.tailor-date-wise-view-payment');
Route::get('/tailor/payment/tailor-date-wise-payment-report','backend\TailorPaymentController@tailordatewisepaymentreport')->name('tailorpayments.tailor-date-wise-payment-report');
Route::get('/tailor/payment/tailor-date-wise-payment-report-pdf','backend\TailorPaymentController@tailordatewisepaymentreportpdf')->name('tailorpayments.tailor-date-wise-payment-report-pdf');

});

Route::prefix('tailorissues')->group(function(){
	Route::get('/view','backend\TailorIssueController@view')->name('tailorissues.view');
	Route::get('/view-pending-list','backend\TailorIssueController@pendinglist')->name('tailorissues.view-pending-list');
	Route::get('/add','backend\TailorIssueController@add')->name('tailorissues.add');
	Route::post('/store','backend\TailorIssueController@store')->name('tailorissues.store');
	Route::get('/edit/{id}','backend\TailorIssueController@edit')->name('tailorissues.edit');
	Route::post('/update/{id}','backend\TailorIssueController@update')->name('tailorissues.update');
	Route::get('/delete/{id}','backend\TailorIssueController@delete')->name('tailorissues.delete');
	Route::get('/tailor/approve{id}','backend\TailorIssueController@approve')->name('tailorissues.approve');
	Route::post('/tailor/approve/srore{id}','backend\TailorIssueController@approvestore')->name('tailorissues.approve-store');
	Route::get('/tailor/return','backend\TailorIssueController@returnlist')->name('tailorissues.view-return-list');
	Route::get('/tailor/return/approve{id}','backend\TailorIssueController@returnapprove')->name('tailorissues.return-approve');
	Route::get('/tailor/return/inapprove{id}','backend\TailorIssueController@returninapprove')->name('tailorissues.return-inapprove');
Route::get('/tailor/allview{id}','backend\TailorIssueController@allview')->name('tailorissues.allview');



});
	

	//========item============
	Route::prefix('items')->group(function(){
Route::get('/items', 'backend\ItemController@view')->name('items.view');
Route::get('/items/data', 'backend\ItemController@add')->name('items.add');
Route::post('/items/store', 'backend\ItemController@store')->name('items.store');
Route::get('/items/edit/{id}', 'backend\ItemController@edit')->name('items.edit');
Route::post('/items/update/{id}', 'backend\ItemController@update')->name('items.update');
Route::get('/items/delete/{id}', 'backend\ItemController@delete')->name('items.delete');

	//========Suppliers============

	
	Route::get('/view','backend\DesignController@view')->name('items.designs.view');
	Route::get('/add','backend\DesignController@add')->name('items.designs.add');
	Route::post('/store','backend\DesignController@store')->name('items.designs.store');
	Route::get('/edit/{id}','backend\DesignController@edit')->name('items.designs.edit');
	Route::post('/update/{id}','backend\DesignController@update')->name('items.designs.update');
	Route::get('/delete/{id}','backend\DesignController@delete')->name('items.designs.delete');

});



//===============Invoice============
Route::prefix('invoices')->group(function(){
Route::get('/invoice/order-view', 'backend\InvoiceController@orderview')->name('invoices.order-view');
Route::get('/invoice/view', 'backend\InvoiceController@view')->name('invoices.view');
Route::get('/invoice/add', 'backend\InvoiceController@add')->name('invoices.add');
Route::post('/invoice/store', 'backend\InvoiceController@store')->name('invoices.store');
Route::get('/invoice/pending-list', 'backend\InvoiceController@pendinglist')->name('invoices.pending-list');
Route::get('/invoice/allview{id}', 'backend\InvoiceController@allview')->name('invoices.allview');
Route::get('/invoice/inactive{id}', 'backend\InvoiceController@inactive')->name('invoices.inactive');
Route::get('/invoice/active{id}', 'backend\InvoiceController@active')->name('invoices.active');
Route::get('/invoice/delete{id}', 'backend\InvoiceController@delete')->name('invoices.delete');
Route::get('/invoice/approve{id}', 'backend\InvoiceController@approve')->name('invoices.approve');
Route::post('/invoice/approve-store{id}', 'backend\InvoiceController@approvestore')->name('invoices.approve-store');

Route::get('/invoice/customer{id}', 'backend\InvoiceController@customerinvoice')->name('invoices.customer-invoice-pdf');
Route::get('daily/invoice/report', 'backend\InvoiceController@dailyorderreportpdf')->name('invoices.daily-report-pdf');
Route::get('daily/invoice/payment/pdf-report', 'backend\InvoiceController@dailypaymentreportpdf')->name('invoices.daily-payment-report-pdf');

// Daily Report



// Invoice Detail edit
Route::get('/invoice/shirt-edit{id}', 'backend\InvoiceController@shirtedit')->name('invoices.shirt-edit');
Route::post('/invoice/shirt-update{id}', 'backend\InvoiceController@shirtupdate')->name('invoices.shirt-update');

Route::get('/invoice/pant-edit{id}', 'backend\InvoiceController@pantedit')->name('invoices.pant-edit');
Route::get('/invoice/coart-edit{id}', 'backend\InvoiceController@coartedit')->name('invoices.coart-edit');

// pdf
Route::get('/invoice/shirt-pdf{id}', 'backend\InvoiceController@shirtpdf')->name('invoices.shirt-pdf');
Route::get('/invoice/pant-pdf{id}', 'backend\InvoiceController@pantpdf')->name('invoices.pant-pdf');
Route::get('/invoice/coart-pdf{id}', 'backend\InvoiceController@coartpdf')->name('invoices.coart-pdf');


});
	//========Stock============
Route::prefix('stocks')->group(function(){
Route::get('/stock/view', 'backend\StockController@stockview')->name('stocks.view');
Route::get('/stock/repport-pdf', 'backend\StockController@stockpdf')->name('stocks.stock-report-pdf');
Route::get('/stock/supplier-view', 'backend\StockController@supplierstockview')->name('stocks.supplier-stock-view');
Route::get('/stock/supplier/repport-pdf', 'backend\StockController@supplierstockpdf')->name('stocks.supplier-stock-report-pdf');
Route::get('/stock/product/repport-pdf', 'backend\StockController@productstockpdf')->name('stocks.product-stock-report-pdf');

});	//========Student============

	Route::prefix('students')->group(function(){
	Route::get('/view','backend\StudentController@view')->name('students.view');
	Route::get('/add','backend\StudentController@add')->name('students.add');
	Route::post('/store','backend\StudentController@store')->name('students.store');
	
});

		Route::prefix('deliveries')->group(function(){
	Route::get('/all-delivery-view','backend\InvoiceController@alldeliveryview')->name('deliveries.all-delivery-view');
	Route::get('/no-delivery-view','backend\InvoiceController@nodeliveryview')->name('deliveries.no-delivery-view');

	Route::get('daily/invoice/order-view', 'backend\InvoiceController@dailyorderview')->name('deliveries.daily-order-view');

Route::get('daily/invoice/payment-view', 'backend\InvoiceController@dailypaymentview')->name('deliveries.daily-payment-view');
Route::get('/invoice/daily/report', 'backend\InvoiceController@dailyorderreport')->name('deliveries.daily-report');
Route::get('/invoice/daily/payment-report', 'backend\InvoiceController@dailypaymentreport')->name('deliveries.daily-payment-report');
	
	
});


Route::get('/get-category', 'backend\DefaultController@getcategory')->name('get-category');
Route::get('/get-subcategory', 'backend\DefaultController@subgetcategory')->name('get-subcategory');
Route::get('/get-subsubcategory', 'backend\DefaultController@subsubgetcategory')->name('get-subsubcategory');
Route::get('/get-brand', 'backend\DefaultController@getbrand')->name('get-brand');
Route::get('/get-productname', 'backend\DefaultController@getproductname')->name('get-productname');
Route::get('/get-mobile', 'backend\DefaultController@getmobile')->name('get-mobile');
Route::get('/get-credit-amount', 'backend\DefaultController@getcreditamount')->name('get-credit-amount');
Route::get('/get-price', 'backend\DefaultController@getprice')->name('get-price');
Route::get('/get-tailor-price', 'backend\DefaultController@gettailorprice')->name('get-tailor-price');
Route::get('/get-item_id', 'backend\DefaultController@getitemid')->name('get-item_id');
Route::get('/get-tailor/price', 'backend\DefaultController@tailorprice')->name('get.tailor.price');
Route::get('/get-size', 'backend\DefaultController@getsize')->name('get-size');
Route::get('/get-size', 'backend\DefaultController@getsize')->name('get-unit');
Route::get('/get-color', 'backend\DefaultController@getcolor')->name('get-color');
Route::get('/get-product-code', 'backend\DefaultController@getproductcode')->name('get-product-code');
Route::get('/get-stock', 'backend\DefaultController@getstock')->name('get-stock');
Route::get('/get-warranty-time', 'backend\DefaultController@getwarrantytime')->name('get-warranty-time');

Route::get('/get-product-name', 'backend\DefaultController@getproduct')->name('get-product');

// });


});