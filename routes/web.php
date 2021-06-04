<?php


/*
|--------------------------------------------------------------------------
| Web Routes for Guest
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/','GuestController@index')->name('Welcome');

Route::get('/page/{slug}', 'GuestController@PageView')->name('viewPage');
Route::get('/digitech','GuestController@demo')->name('digitech');
Route::get('/banned/logout', 'GuestController@banned')->name('bannedLogout');
Route::get('/verify/logout', 'GuestController@verifyLogout')->name('verifyLogout');
Route::get('/verify/user/{token}', 'GuestController@emailverify')->name('emailverify');






/*
|--------------------------------------------------------------------------
| Web Routes for Admin
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>['auth','admin','ban']], function (){

    Route::get('/admindashboard','AdminController@index')->name('admindashboard');

    Route::get('/styleindex', 'AdminStyleController@index')->name('styleindex');
    Route::post('/styleindex','AdminStyleController@store')->name('styleindex.post');
    Route::get('/createinvestplan','AdminInvestController@create')->name('createinvestplan');
    Route::post('/createinvestplan','AdminInvestController@store')->name('createinvestplan.post');
    Route::get('/planindex','AdminInvestController@index')->name('planindex');
    Route::get('/editplan/{id}','AdminInvestController@edit')->name('editplan');
    Route::put('/editplan/{id}', 'AdminInvestController@update')->name('editplan.update');
    Route::get('/registered-users', 'AdminUsersController@index')->name('registered-users');
    Route::get('/users/edit-registered-users/{id}', 'AdminUsersController@update')->name('edit-registered-users.update');

    Route::get('admin.users.show.{id}','AdminUsersController@show')->name('showdetails');
    Route::get('/pageindex','AdminPagesController@index')->name('pageindex');
    Route::get('/page.editpage.id}','AdminPagesController@edit')->name('page.editpage.edit');
    Route::post('/pageupdate.{id}','AdminPagesController@update')->name('pageupdate');
    Route::get('/pagepublish.{id}','AdminPagesController@publish')->name('pagepublish');
    Route::get('/pageunpublish.{id}','AdminPagesController@unpublish')->name('pageunpublish');

    Route::get('/creategateway','AdminGatewaysController@localcreate')->name('creategateway');
    Route::post('/creategateway','AdminGatewaysController@store')->name('creategateway.post');
    Route::get('/create.instant.gateway','AdminGatewaysController@createInstant')->name('admin.create.instant');
    Route::post('/create.instant.gateway.store','AdminGatewaysController@storeInstant')->name('admin.storeInstant');
    Route::get('/localgateways', 'AdminGatewaysController@localindex')->name('localgateways');
    Route::get('/admin.gateways', ['uses' => 'AdminGatewaysController@index', 'as' => 'admin.gateways.index']);
    Route::get('/admin.gateway.edit.id}', ['uses' => 'AdminGatewaysController@edit', 'as' => 'admin.gateway.edit']);
    Route::get('/admin.gateway.delete.{id}', ['uses' => 'AdminGatewaysController@destroy', 'as' => 'admin.gateway.delete']);
    Route::post('/admin.gateway.update.{id}', ['uses' => 'AdminGatewaysController@update', 'as' => 'admin.gateway.update']);

    Route::get('/websitesettings','SettingsController@index')->name('websitesettings');
    Route::post('/generalsettings','SettingsController@generalSettings')->name('generalsettings');
    Route::get('/admin.users.deposits',['uses' => 'AdminController@userDeposits', 'as' =>'admin.users.deposits']);
    Route::get('/admin.user.deposit.local',['uses' => 'AdminController@localDeposits', 'as' =>'admin.deposit.local']);
    Route::get('/admin.user.deposit.local.update.{id}','AdminController@localDepositsUpdate')->name('admin.deposit.update');
    Route::get('/admin.user.deposit.local.fraud.{id}','AdminController@localDepositsFraud')->name('admin.deposit.fraud');

    Route::get('/admin.users.withdrawals','AdminController@userWithdraws')->name('admin.users.withdraws');
    Route::get('/admin.withdrawal.requests','AdminController@localWithdraws')->name('admin.withdraw.requests');
    Route::get('/admin.user.withdraw.update.{id}','AdminController@payment')->name('admin.withdraw.update');
    Route::get('/admin.user.withdraw.fraud.{id}','AdminController@withdrawFraud')->name('admin.withdraw.fraud');


    Route::get('/admin.user.investments',['uses' => 'AdminInvestController@investrequest', 'as' =>'admin.users.investmentrequest']);
    Route::get('/admin.user.invest.local',['uses' => 'AdminInvestController@localinvestrequest', 'as' =>'admin.users.local.investmentrequest']);
    Route::get('/admin.user.invest.local.update/{id}','AdminInvestController@localInvestsUpdate')->name('admin.invest.update');

    Route::get('/memberships.create','AdminMembershipController@create')->name('memberships.create');
    Route::get('/memberships.index','AdminMembershipController@index')->name('memberships.index');
    Route::post('/memberships.create','AdminMembershipController@store')->name('memberships.store');
    Route::get('/memberships.edit/{id}','AdminMembershipController@edit')->name('memberships.edit');
    Route::post('/memberships.update/{id}','AdminMembershipController@update')->name('memberships.update');
    Route::get('/memberships.delete/{id}','AdminMembershipController@destroy')->name('memberships.delete');

    Route::get('/links.create','AdminLinkController@create')->name('links.create');
    Route::get('/links.index','AdminLinkController@index')->name('links.index');
    Route::get('/links.edit/{id}','AdminLinkController@edit')->name('links.edit');
    Route::get('/links.delete/{id}','AdminLinkController@destroy')->name('links.delete');
    Route::post('/links.create','AdminLinkController@store')->name('links.store');
    Route::post('/links.update/{id}','AdminLinkController@update')->name('links.update');

    Route::get('/admin.advert.planIndex', ['uses' => 'AdminAdvertPlanController@index', 'as' => 'admin.advert.planIndex']);
    Route::post('/admin.advert.plan.store', ['uses' => 'AdminAdvertPlanController@store', 'as' => 'admin.advert.plan.store']);
    Route::get('/advert.plan.edit.{id}', ['uses' => 'AdminAdvertPlanController@edit', 'as' => 'admin.advert.planEdit']);
    Route::post('/advert.plan.update.{id}', ['uses' => 'AdminAdvertPlanController@update', 'as' => 'admin.advert.planUpdate']);
    Route::get('/advert.plan.destroy.{id}', ['uses' => 'AdminAdvertPlanController@destroy', 'as' => 'admin.advert.planDestroy']);
    Route::get('/user.advert.request', ['uses' => 'AdminAdvertPlanController@request', 'as' => 'admin.user.advert.request']);
    Route::get('/user.advert.request.approve.{id}', ['uses' => 'AdminAdvertPlanController@approve', 'as' => 'admin.user.advertAp']);
    Route::get('/user.all.adverts', ['uses' => 'AdminAdvertPlanController@allAds', 'as' => 'admin.user.advertAll']);
    Route::get('/user.advert.pause.{id}', ['uses' => 'AdminAdvertPlanController@pause', 'as' => 'admin.user.advertPR']);
    Route::get('/user.advert.edit.{id}', ['uses' => 'AdminAdvertPlanController@orderEdit', 'as' => 'admin.user.advertEdit']);
    Route::post('/user.advert.submit.edit.{id}', ['uses' => 'AdminAdvertPlanController@orderEditsubmit', 'as' => 'admin.user.advertEditSubmit']);

    Route::get('/ptc', ['uses' => 'AdminPTCController@index', 'as' => 'admin.ptcs.index']);
    Route::get('/ptc.create', ['uses' => 'AdminPTCController@create', 'as' => 'admin.ptc.create']);
    Route::post('/ptc.create', ['uses' => 'AdminPTCController@store', 'as' => 'admin.ptc.store']);
    Route::get('/ptc.delete.{id}', ['uses' => 'AdminPTCController@destroy', 'as' => 'admin.ptc.delete']);
    Route::get('/ptc.edit.{id}', ['uses' => 'AdminPTCController@edit', 'as' => 'admin.ptc.edit']);
    Route::post('/ptc.update.{id}', ['uses' => 'AdminPTCController@update', 'as' => 'admin.ptc.update']);
    Route::get('/ptc.preview.about-img{id}', ['uses' => 'AdminPTCController@preview', 'as' => 'admin.ptc.preview']);
});






/*
|--------------------------------------------------------------------------
| Web Routes for User
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['middleware'=>['auth','ban']], function (){

Route::get('/userdashboard', 'HomeController@index')->name('userdashboard');
Route::get('/user.daily.rewards', 'HomeController@daily')->name('userDailyBonus');
Route::get('/earninghistory', 'HomeController@earnHistory')->name('earninghistory');
Route::get('/user.daily.earnings','HomeController@dailyearningsHistory')->name('user.dailyBonuses');
Route::get('/user.advertisements.plan', 'HomeController@uPlan')->name('userAdPlan');
Route::post('user.advertisements.plan.active.{id}', 'HomeController@uPlanActive')->name('userAdPlan.activation');
Route::get('/user.advertisements.history', 'HomeController@uPlanLog')->name('uPlanLog');
Route::get('/user.advertisements.preview.{id}', 'HomeController@pShow')->name('pShow');


Route::get('/profile', 'UserProfileController@index')->name('profile');
Route::post('/profileupdate', 'UserProfileController@profileUpdate')->name('profileupdate');
Route::get('/invest.index','UserInvestmentController@index')->name('index');
Route::post('/investindex','UserInvestmentController@submit')->name('investindexsubmit');
Route::post('/investconfirm', 'UserInvestmentController@confirm')->name('investconfirm');
Route::get('/invest.history', 'UserInvestmentController@investHistory')->name('investhistory');
Route::get('/interestlog','UserEarningsController@interestHistory')->name('interestlog');

Route::get('/makewithdrawal','UserWithdrawsController@withdraw')->name('makewithdrawal');
Route::post('/makewithdrawal','UserWithdrawsController@postWithdrawal')->name('makewithdrawal.post');
Route::get('/withdraw.history','UserWithdrawsController@history')->name('user.withdraw.history');
Route::get('/depositindex','UserDepositsController@index')->name('depositindex');
Route::get('/makedeposit','UserDepositsController@create')->name('makedeposit');

Route::post('/depositpreview','UserDepositsController@paymentPreview')->name('depositpreview');
Route::post('/depositpreview.instant', 'UserDepositsController@instantPreview')->name('instantPreview');
Route::post('/depositconfirm', 'UserDepositsController@offline')->name('depositconfirm');
Route::post('depositcrypto.confirm', 'UserDepositsController@cryptoConfirm')->name('cryptoConfirm');

Route::get('/newreferral','UsersReferralController@newReferal')->name('newreferral');
Route::get('/myreferrals','UsersReferralController@index')->name('myreferrals');
Route::get('/user.review','HomeController@review')->name('review');
Route::post('/user.review.post','HomeController@reviewPost')->name('userReiview.post');

Route::get('/memberships', 'UserMembershipController@index')->name('userMemberships');
Route::get('/membership.upgrade.{id}', 'UserMembershipController@upgrade')->name('userMembership.upgrade');

Route::get('/user.link.shares', 'UserAdvertsController@shareLinks')->name('userLink.share');
Route::get('/user.cash.link.show.{id}', 'UserAdvertsController@cashLinkShow')->name('userCashLinks.show');
Route::get('/user.save.share.{id}', 'UserAdvertsController@save_share')->name('fbShare');
Route::get('/userCash.links','UserAdvertsController@cashLinks')->name('userCash.links');
Route::get('/user.cash.link.confirm.{id}', 'UserAdvertsController@cashLinkConfirm')->name('userCashLink.confirm');

});

Route::post('/crypto.payment.status', 'UserDepositsController@cryptoStatus')->name('userDepositCrypto');








