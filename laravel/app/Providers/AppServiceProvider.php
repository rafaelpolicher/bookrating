<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('firstname', function ($attribute, $value, $parameters, $validator) {
            // Verificar se o campo 'firstname' contém apenas letras e espaços
            return preg_match('/^[a-zA-Z\s]+$/', $value);
        });
        
        Validator::extend('lastname', function ($attribute, $value, $parameters, $validator) {
            // Verificar se o campo 'lastname' contém apenas letras e espaços
            return preg_match('/^[a-zA-Z\s]+$/', $value);
        });
    }
}
