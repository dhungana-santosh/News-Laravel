<?php

namespace App\Providers;
use App\Http\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;

use Illuminate\Support\ServiceProvider;

class ValidateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('old_password_check',function($attribute,$value,$parameters){
            $id=$parameters[2];
            $user=User::find($id);

            if(Hash::check($value,$user->password)){
                return true;
            }else{
                return false;
            }
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
