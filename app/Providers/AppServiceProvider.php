<?php

namespace App\Providers;

use App\enrollment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('uniqueGlobalUserGroup', function ($attribute, $value, $parameters, $validator) {
            $count = DB::table('global_user_group')->where('id_user', $value)
                ->where('id_userGroup', $parameters[0])
                ->count();

            return $count === 0;
        });

        Validator::extend('uniqueMasterClass', function ($attribute, $value, $parameters, $validator) {
            $count = DB::table('master_courses')->where('courseDepartment', $value)
                ->where('courseNumber', $parameters[0])
                ->count();

            return $count === 0;
        });


    }
}
