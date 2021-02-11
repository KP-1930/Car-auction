<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
         $this->registerPolicies();
        //  Gate::define('isAdmin',function($user){
        //     //return true;
        //     $roles = $user->roles->first()->id == 2;
        //    // dd($roles);
        //     return in_array('adminView',compact('roles'));
        // });

        // Gate::define('isSuperAdmin',function($user){
        //     //return true;
        //     $roles = $user->roles->first()->id == 1;
        //    // dd($roles);
        //     return in_array('index',compact('roles'));
        // });

        // Gate::define('isAllowed',function($user,$allowed){
        //     $allow = explode(":",$allowed);
        //     //dd($allowed);
        //     $roles = $user->roles->pluck('name')->toArray();
        //    // dd($roles);
        //     $abc =  array_intersect($allow,$roles);
        //     return $abc;
        // });



        // Gate::define('isAllowed',function($user,$k){
        //     //dd($kk);
        //     $users = $user->roles['name'];
        //    // dd($users);
        //     return $users === $k; 
        // });


        

    }
}
