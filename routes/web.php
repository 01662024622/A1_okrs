<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

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

Auth::routes(['register' => false, 'request' => false, 'reset' => false]);


Route::get('/report/user/{auth}', 'HT10\CustomerController@intergration');
Route::get('/review/user/{auth}', 'HT10\CustomerController@reviewauth');
Route::get('/review/users/used', 'HT10\CustomerController@review');
Route::get('/review/user/success/{auth}', 'HT10\CustomerController@success');

Route::get('/home', 'View\ViewAuthenticationController@home')->name('home');
Route::get('/', 'View\ViewAuthenticationController@home')->name('home');


Route::resource('users', 'HT20\UserController');
Route::resource('apartments', 'HT20\ApartmentController');
Route::resource('groups', 'HT20\GroupController');

Route::get('profile', 'HT20\UserEditController@profile');
Route::get('change-password', 'HT20\UserEditController@password');
Route::post('change-password', 'HT20\UserEditController@changePassword');
Route::post('user-profile', 'HT20\UserEditController@updateProfile');

//Route::resource('report/market', 'HT10\ReportMarketController');
Route::resource('/review/report', 'HT10\ReviewController');
Route::resource('/feedback/report', 'HT10\FeedbackController');
Route::resource('/customer/feedback/report', 'HT10\CustomerFeedbackController');
Route::resource('/targets', 'HT30\TargetController');
Route::resource('/targetkpi', 'HT30\TargetKpiController');
Route::resource('/kpis', 'HT30\KpiController');
Route::resource('/kpi/results', 'HT30\KpiResultController');
Route::resource('/kpi/managers', 'HT30\OKRController');
Route::resource('/results', 'HT30\ResultController');
Route::resource('/sms', 'HT50\SMSController');
Route::resource('/HT50/accumulate', 'HT50\AccumulateController');
Route::post('/feedback/PR', 'HT10\FeedbackPRController@store');
Route::post('/feedback/warehouse', 'HT10\FeedbackWareHouseController@store');

//Route::get('/customer/feedback/full', 'HT10\CustomerFeedbackController@indexCode');
//Route::get('/', 'HT10\ReportMarketController@index');
Route::get('/review/feedback', 'HT10\ReviewViewController@feedbackMe');
Route::get('/review/feedback/auth/{auth}', 'Authentication\FeedbackViewController@feedbackMeAuth');

Route::get('/review/apartment/feedback', 'HT10\ReviewViewController@feedbackApartment');
Route::get('/review/apartment/feedback/auth/{auth}', 'Authentication\FeedbackViewController@feedbackApartmentAuth');
Route::get('/review/feedback/manager', 'HT10\ReviewViewController@feedbackManager');
Route::get('/review/browser/feedback', 'HT10\ReviewViewController@feedbackBrowser');
Route::get('/review/browser/feedback/{auth}', 'Authentication\FeedbackViewController@feedbackAuthBrowser');
Route::get('/review/warehouse/report', 'HT10\ReviewViewController@warehouse');
Route::get('/review/warehouse/manager/report', 'HT10\ReviewViewController@warehouseManager');
Route::get('/review/public/relationship/report', 'HT10\ReviewViewController@publicRelationship');
Route::get('/review/public/relationship/manager/report', 'HT10\ReviewViewController@publicRelationshipManager');
Route::get('/review/feedback/customer/report', 'HT10\ReviewViewController@feedbackCustomer');
Route::get('/review/feedback/customer/manager/report', 'HT10\ReviewViewController@feedbackCustomerManager');


Route::resource('categories', 'HT00\CategoryController');
Route::resource('HT01', 'HT50\InforCustomerSurveyController');
//Route::resource('HT02', 'HT50\InforCustomerSurveyController');

Route::resource('posts', 'HT00\PostController');

Route::get('/tests', function () {
   return view('test');
});
Route::resource('/organization','HT00\OrganizationController' );
// Get data Table group
Route::group(['prefix' => 'api/v1'], function () {
    Route::get('category/table', 'DataApi\CategoryApiController@anyData')->name('category.api.data');
    Route::get('users/table', 'DataApi\UserApiController@anyData')->name('users.api.data');
    Route::get('apartments/table', 'DataApi\ApartmentApiController@anyData')->name('apartments.api.data');
    Route::get('groups/table', 'DataApi\GroupApiController@anyData')->name('groups.api.data');
    Route::get('report/market/table', 'DataApi\ReportMarketController@anyData')->name('report_market.api.data');
    Route::get('report/review/table', 'DataApi\ReportApiController@reviewData')->name('report_review.api.data');
    Route::get('report/review/feedbackme/table', 'DataApi\ReportApiController@feedbackMeData')->name('report_feedbackme.api.data');
    Route::get('report/review/feedback/apartment/table', 'DataApi\ReportApiController@feedbackApartmentData')->name('report_feedback_apartment.api.data');
    Route::get('report/review/feedback/browser/table', 'DataApi\ReportApiController@feedbackBrowserData')->name('report_feedback_browser.api.data');
    Route::get('report/review/feedback/warehouse/table', 'DataApi\ReportApiController@feedbackWarehouseData')->name('report_feedback_warehouse.api.data');
    Route::get('report/review/feedback/warehouse/manager/table', 'DataApi\ReportApiController@feedbackWarehouseDataManager')->name('report_feedback_warehouse_manager.api.data');
    Route::get('report/review/feedback/public/relationship/table', 'DataApi\ReportApiController@feedbackPRData')->name('report_feedback_pr.api.data');
    Route::get('report/review/feedback/public/relationship/manager/table', 'DataApi\ReportApiController@feedbackPRDataManager')->name('report_feedback_pr_manager.api.data');
    Route::get('report/review/feedback/customer/table', 'DataApi\ReportApiController@feedbackCustomerData')->name('report_feedback_customer.api.data');
    Route::get('report/review/feedback/customer/manager/table', 'DataApi\ReportApiController@feedbackCustomerDataManager')->name('report_feedback_customer_manager.api.data');
//    HT00
    Route::get('users/search/{query?}', 'DataApi\UserApiController@getListUser')->name('get_list_user_category.api.data');
    Route::get('users/role/{id}', 'DataApi\UserApiController@getListRoleUser')->name('get_list_role_user_category.api.data');

    Route::get('apartments/search/{query?}', 'DataApi\ApartmentApiController@getListApartment')->name('get_list_apartment_category.api.data');
    Route::get('apartments/role/{id}', 'DataApi\ApartmentApiController@getListRoleApartment')->name('get_list_apartment_category.api.data');

    Route::get('groups/search/{query?}', 'DataApi\GroupApiController@getListGroup')->name('get_list_apartment_category.api.data');
    Route::get('groups/role/{id}', 'DataApi\GroupApiController@getListRoleGroup')->name('get_list_apartment_category.api.data');

    Route::get('posts/table', 'DataApi\PostApiController@anyData')->name('posts.api.data');
    Route::get('targets/table', 'DataApi\TargetApiController@anyData')->name('targets.api.data');
    Route::get('user/targets/table', 'DataApi\TargetApiController@anyDataUser')->name('targets.api.data');
    Route::get('targets/kpis/table', 'DataApi\TargetApiController@anyDataResult')->name('targets.api.data');
    Route::get('kpis/table', 'DataApi\KpiApiController@anyData')->name('kpis.api.data');
    Route::get('/analytic/table', 'DataApi\TargetApiController@analystic')->name('analystic.api.data');
});

// Set Status group

Route::group(['prefix' => 'api/status'], function () {
    Route::get('categories/{id}', 'status\StatusController@categories')->name('categories.api.status');
    Route::post('users/{id}', 'DataApi\UserApiController@status')->name('users.api.status');
    Route::post('review/{id}', 'DataApi\ReportApiController@status')->name('review.api.status');
    Route::post('categories/sort', 'DataApi\CategoryApiController@saveSort')->name('categories.api.sort');

});


