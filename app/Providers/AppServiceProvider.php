<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Validator::extend('recaptcha' ,  function ($attribute,$value,$parameters,$validator){
            $client = new Client();
            $response = $client->request('POST' , 'https://www.google.com/recaptcha/api/siteverify',[
                'form_params' => [
                    'secret' => config('services.recaptcha.secret'),
                    'response' => $value,
                    'remoteip' => request()->ip()
                ]
            ]);
            $response = \GuzzleHttp\json_decode($response->getBody());
            return $response->success;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
