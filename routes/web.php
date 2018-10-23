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
//17
Route::get('/', function () {
    //return auth()->loginUsingId(1);
    //dd(url()->full());
    //event(new \App\Events\UsersActivation(\App\User::find(1)));
    /*alert()->info('test');*/
    return view('welcome');

});

Route::get('/cookie/set','HomeController@setCookie');
Route::get('/cookie/get','HomeController@getCookie');

Route::get('user/email/{token}' , 'HomeController@activation')->name('activation.account');




Route::group(['namespace'=>'Admin' , 'prefix'=>'admin' , 'middleware' => ['auth:web' , 'checkAdmin']] , function (){

    $this->get('panel' , 'PanelController@index')->name('admin.panel');
    $this->resource('articles' , 'ArticleController');
    $this->resource('courses' , 'CourseController');
    $this->resource('episodes' , 'EpisodeController');
    $this->post('/panel/upload-image ' , 'PanelController@uploadImageSubject');
    $this->resource('roles' , 'RoleController');
    $this->resource('permissions' , 'PermissionController');

    $this->group([] , function (){
        $this->resource('users' , 'UserController')->middleware('can:show-users');
        $this->resource('level' , 'LevelManageController' , ['parameters'=>['level'=>'user']]);
    });


});

Route::group(['namespace'=>'Auth'] , function (){
    // Authentication Routes...
    $this->get('login', 'LoginController@showLoginForm')->name('login');
    $this->post('login', 'LoginController@login');
    $this->post('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    $this->get('register', 'RegisterController@showRegistrationForm')->name('register');
    $this->post('register', 'RegisterController@register');

    // Password Reset Routes...
    $this->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'ResetPasswordController@reset');


    $this->get('login/google', 'LoginController@redirectToProvider');
    $this->get('login/google/callback', 'LoginController@handleProviderCallback');
});

Route::post('data' , function (){
    $validate = \Illuminate\Support\Facades\Validator::make(request()->all() , [
        'message' => 'required',
        'g-recaptcha-response' => 'recaptcha'
    ]);
    if ($validate->fails())
    {
        return 'fails';
    }
    return request('message');
});



//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
