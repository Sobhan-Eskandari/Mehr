<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\News;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Admin;
use App\Market;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomePageController@homePage')->name('homePage');

Route::resource('/stores','StoresController');
Route::get('/BestMarkets','StoresController@BestMarkets')->name('BestMarkets');
Route::post('/stores/filter','StoresController@FilterResults')->name('FilterResults');
Route::get('/stores/filter','StoresController@FilterResults');

Route::get('/aboutUs', function () {
    return view('main.aboutUs');
})->name('aboutUs');

Route::get('/contactUs', 'MessageController@ContactUsView')->name('contactUs');

Route::get('/FAQs', 'FAQController@FAQView')->name('FAQ');

Route::get('/services/{id}', function ($id) {
    return view('main.services', compact('id'));
})->name('services');

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
    Route::post('/login', 'AdminAuth\LoginController@login');
    Route::post('/logout', 'AdminAuth\LoginController@logout');

    Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
    Route::post('/register', 'AdminAuth\RegisterController@register');

    Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
    Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
    Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

});

Route::group(['middleware' => 'admin'], function (){

    //////NewsController
    Route::resource('/FAQ', 'FAQController');
    Route::get('/NewsDash', 'NewsController@DashIndex')->name('News.DashIndex');
    Route::get('/NewsResult', 'NewsController@DashIndex');
    Route::post('/NewsDash/result', 'NewsController@SearchNews');
    //////categoryController
    Route::resource('systemicCategories','categoryController');
    //////UserController
    Route::resource('/customers','UserController');

    Route::post('/customer','UserController@finduser')->name('searchusers');
    Route::get('/customer','UserController@index')->name('markets.index');
    //////MessageController
    Route::resource('/messages', 'MessageController');
    Route::post('/messages/mail', 'MessageController@sendMail');
    /////regTypeController
    Route::resource('regTypes','regTypeController');
    /////tagController
    Route::resource('tags','TagController');
    /////marketCategoryController
    Route::resource('marketCategories','mategory');
    /////marketController{{{{{{{{
    /////createMarket{{{{

    //////findSeller
    ////findMarketer
//    Route::resource('/market','marketController');

    Route::post('markets/searchMarketer','marketController@searchMarketer')->name('searchMarketer');
    Route::get('markets/searchMarketer','marketController@searchMMarketer')->name('searchMarketer');
    //////}}}}findMarket
    /////editMarket{{{{
    Route::post('/market','marketController@findmarket')->name('searchmarkets');
    Route::get('/market','marketController@index')->name('markets.index');
    Route::get('/markets','marketController@index')->name('markets.index');
    Route::get('/markets/{id}','marketController@show')->name('show');
    //////}}}}editMarketF
    //Route::resource('markets','marketController');
    ////}}}}}}}marketController
    Route::resource('tariff','tariffController');
    Route::resource('tariffs','tariff2Controller');
//    Route::get('/tariff', 'tariffController@index')->name('tariff.index');

    //////AdminController
    Route::resource('/settings','AdminController');
    Route::Post('/settings/info', 'AdminController@info')->name('info');

    //////BackupController
    Route::get('backup', 'ExcelController@Backup')->name('backup');
    Route::get('downloadBackupUsers/{type}', 'ExcelController@downloadBackupUsers');
    Route::get('downloadBackupMarkets/{type}', 'ExcelController@downloadBackupMarkets');
    Route::post('uploadBackupUsers', 'ExcelController@uploadBackupUsers');
    Route::post('uploadBackupMarkets', 'ExcelController@uploadBackupMarkets');

});

Route::group(['middleware' => 'CreateNewsMiddleware'], function () {
    Route::get('/News/create', 'NewsController@create')->name('News.create');
    Route::post('/News', 'NewsController@store')->name('News.store');
});

Route::group(['middleware' => 'EditNewsMiddleware'], function (){
    Route::get('/News/{News}/edit', 'NewsController@edit')->name('News.edit');
    Route::put('/News/{News}', 'NewsController@update')->name('News.update');
});

Route::group(['middleware' => 'DeleteNewsMiddleware'], function (){
    Route::delete('/News/{News}', 'NewsController@destroy')->name('News.destroy');
});

Route::get('/News', 'NewsController@index')->name('News.index');

Route::get('/News/{News}', 'NewsController@show')->name('News.show');

Route::group(['middleware'=>'ViewMessageMiddleware'], function (){
    Route::resource('/messages', 'MessageController');
    Route::post('/messages/mail', 'MessageController@sendMail');
    Route::post('/messages/send', 'MessageController@SendMailToUser');
});

/**
 * Create, Edit, Delete of customers access control (start)
 */
Route::group(['middleware'=>'CreateCustomerMiddleware'], function (){
    Route::get('/customers/create', 'UserController@create')->name('customers.create');
    Route::post('/customers', 'UserController@store')->name('customers.store');
});

Route::group(['middleware'=>'EditCustomerMiddleware'], function (){
    Route::get('/customers/{customer}/edit', 'UserController@edit')->name('customers.edit');
    Route::put('/customers/{customer}', 'UserController@update')->name('customers.update');
});

Route::group(['middleware'=>'DeleteCustomerMiddleware'], function (){
    Route::delete('/customers/{customer}', 'UserController@destroy')->name('customers.destroy');
});
/**
 * Create, Edit, Delete of customers access control (finish)
 */

/**
 * Create, Edit, Delete of markets access control (start)
 */


Route::group(['middleware'=>'CreateMarketMiddleware'], function (){
    /////findSeller
//    Route::get('/markets/create', 'marketUserController@create')->name('markets.create');
    Route::get('markets/create/{id}','marketController@create')->name('create');
////findSeller
    Route::post('market/searchSeller','marketController@searchSeller')->name('searchSeller');
    Route::get('market/searchSeller','marketController@searchSSeller')->name('searchSeller');

    Route::post('/markets', 'marketController@store')->name('markets.store');
});

Route::group(['middleware'=>'EditMarketMiddleware'], function (){
    Route::get('markets/{marketId}/edit/{sellerId}','marketController@edit')->name('edit');
    ////findSeller
    Route::post('markets/searchSeller/{marketId}','marketController@searchSellerEdit')->name('searchSellerEdit');
    Route::get('markets/searchSeller/{marketId}','marketController@searchSSellerEdit')->name('searchSellerEdit');
    //////findSeller
//    Route::get('/markets/{market}/edit', 'marketController@edit')->name('markets.edit');
    Route::patch('/markets/{market}', 'marketController@update')->name('markets.update');
});
Route::group(['middleware' => 'jibirish'], function () {
    Route::get('/jibirish', 'UserController@jibirish');
});
Route::group(['middleware'=>'DeleteMarketMiddleware'], function (){
    Route::delete('/markets/{market}', 'marketController@destroy')->name('markets.destroy');
});
/**
 * Create, Edit, Delete of markets access control (finish)
 */

/**
 * Create, Edit, Delete of admin access control (start)
 */
Route::group(['middleware'=>'CreateAdminMiddleware'], function (){
    Route::get('/settings/create', 'AdminController@create')->name('settings.create');
    Route::post('/settings', 'AdminController@store')->name('settings.store');
});

Route::group(['middleware'=>'EditAdminMiddleware'], function (){
    Route::get('/settings/{setting}/edit', 'AdminController@edit')->name('settings.edit');
    Route::put('/settings/{setting}', 'AdminController@update')->name('settings.update');
});

Route::group(['middleware'=>'DeleteAdminMiddleware'], function (){
    Route::delete('/settings/{setting}', 'AdminController@destroy')->name('settings.destroy');
});
/**
 * Create, Edit, Delete of admin access control (finish)
 */


Route::post('/messages', 'MessageController@store')->name('messages.store');

///////sms
Route::post('findUser','sms@findUser')->name('findUser');
Route::get('findUser','sms@findUUser')->name('findUser');
Route::get('send/{number}','sms@sms')->name('sms');
Route::post('sendSms','sms@sendSms')->name('sendSms');

Route::get('/json-market/{id?}', function($id = null) {
        $markets = Market::get([
            'id',
            'market_name',
            'state',
            'city',
            'address',
            'zip',
            'longitude',
            'latitude',
            'normal_percentage',
            'special_percentage',
            'special_percentage_start',
            'special_percentage_end',
            'text',
            'market_type',
        ]);

        foreach ($markets as $market){
            is_null($market->zip) ? $market->zip = '' : $market->zip;
            is_null($market->normal_percentage) ? $market->normal_percentage = '' : $market->normal_percentage;
            is_null($market->special_percentage) ? $market->special_percentage = '' : $market->special_percentage;
            is_null($market->special_percentage_start) ? $market->special_percentage_start = '' : $market->special_percentage_start;
            is_null($market->special_percentage_end) ? $market->special_percentage_end = '' : $market->special_percentage_end;
        }

        $tariffCategories = [];
        $photos = [];

        for($i = 0; $i < count($markets); $i++){
            foreach ($markets[$i]->photos as $photo){
                $photos[] = "http://khanefile.ir/marketsPhotos/" . $photo->address;
            }
            if(count($photos) < 3){
	            for($j = count($photos); $j < 3; $j++){
	                $photos[$j] = 'http://khanefile.ir/images/noImage.png';
	            }
            }
            $markets[$i]['photos_address'] = $photos;
            $photos = [];

            foreach ($markets[$i]->tariff2s as $tariff2) {
                $tariffCategories[] = $tariff2->tariffs;
            }
            $markets[$i]['category'] = $tariffCategories;
            $tariffCategories = [];

        }
        foreach ($markets as $market){
            $market['text'] = strip_tags($market['text']);
        }
    $response =  Response::json(array(
        'error' => false,
        'markets' => $markets,
        'status_code' => 200
    ));

    return $response;
});

Route::get('/json-news/{id?}', function($id = null) {
    if ($id == null) {
        $news = News::get();
        foreach ($news as $new){
            $new['body'] = strip_tags($new['body']);
        }
    } else {
        $news = News::findOrFail($id);
        $news['body'] = strip_tags($news['body']);
    }
    $response =  Response::json(array(
        'error' => false,
        'news' => $news,
        'status_code' => 200
    ));

    return $response;
});

Route::get('/site-info', function() {
    $info = \App\SiteInfo::findOrFail(1);
    $info['about'] = strip_tags($info['about']);

    $response =  Response::json(array(
        'error' => false,
        'news' => $info,
        'status_code' => 200
    ));

    return $response;
});

Route::get('/faq-json', function() {
    $faqs = \App\FAQ::all();
//    dd($faqs[0]);
    foreach ($faqs as $key => $value){
        $faqs[$key]['question'] = strip_tags($value['question']);
        $faqs[$key]['answer'] = strip_tags($value['answer']);
    }

    $response =  Response::json(array(
        'error' => false,
        'news' => $faqs,
        'status_code' => 200
    ));

    return $response;
});

//Route::get('sendSms/{number}','sms@sendSms')->name('sendSms');
//////sms

Route::group(['middleware'=>'auth'], function (){
    Route::get('/userDashboard','UserDashboardController@user')->name('userDashboard');
    Route::get('/sellerDashboard','UserDashboardController@seller')->name('sellerDashboard');
});

Route::post('/new-app-login', 'UserController@NewAppLogin')->name('new-app-login');

Route::get('/restore', function (){
    \App\News::withTrashed()->whereId(1)->restore();
    \App\News::withTrashed()->whereId(2)->restore();
});
Route::post('/search','SearchController@search');
Route::get('/search','SearchController@searche');

Route::post('/json','SearchController@json');