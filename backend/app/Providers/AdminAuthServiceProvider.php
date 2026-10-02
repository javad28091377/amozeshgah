<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AdminAuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // 
    }

    public function boot(): void
    {
        // ثبت provider سفارشی برای گارد
        Auth::provider("admin_provider",function($app,array $config)
        {
            return new EloquentUserProvider($app['hash'],\App\Models\Login::class);
        });

        // ثبت driver سفارشی برای گارد
        Auth::extend('admin_guard',function($app,$name,array $config){
            $provider = Auth::createUserProvider($config['provider']);

            $guard = new SessionGuard($name,$provider,$app['session.store'],$app['request']);
            $guard->setCookieJar($app['cookie']);
            $guard->setDispatcher($app['events']);
            $guard->setRequest($app->refresh('request',$guard,'setRequest'));

            return $guard;
        });
    }
}
