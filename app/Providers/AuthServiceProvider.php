<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        // Edit Control From user Owner and Admin
        Gate::define('edit_post', function($user,$post){
          if($user->id === $post->user_id){
            return true;
          }
          if($user->isAdmin === 1){
            return true;
          }
          return false;
        });

        // Edit Control From user Owner and Admin
        Gate::define('delete_post', function($user){
          if($user->isAdmin === 1){
            return true;
          }
          return false;
        });
    }
}
