<?php

namespace App\Providers;

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
        $contact = [];
        $logo = [];
        try{
            $contact =  \App\ContactData::first();
        } catch (\Exception $e) { }

        try {
            $logo = \App\Logo::first();
       }  catch (\Exception $e) {

       }

        view()->share(array('DataContact'=> $contact, 'logo' => $logo));
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
