<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ContactData;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $contact = [];
        try{
            $contact =  \App\ContactData::first();
        } catch (\Exception $e) {
            return $e;
        }
        view()->share('contactDat',$contact);
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
