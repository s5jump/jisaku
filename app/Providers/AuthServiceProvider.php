<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        // 管理者権限設定
        Gate::define('isAdmin',function($user){
            return $user->role === 1;
        });
        //管理者だけ見せる　https://qiita.com/lyra/items/7fe68e182f137190edc1
        //店舗管理者
        Gate::define('shopAdmin',function($user){
            return $user->role === 2;
        });
    }
}
