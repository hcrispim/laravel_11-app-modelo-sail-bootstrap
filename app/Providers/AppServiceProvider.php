<?php

namespace App\Providers;

use App\Models\MaquinaTreino;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
//        //ESTA IMPLEMENTACAO POLICIES PERMITE UMA ACAO (VIEW)  PERTENCER A VARIAS ROLES (ADMIN, COMUM)
//        $permissions = config('permissions');
//        foreach ($permissions as $permission => $roles) {
//            Gate::define($permission, function (User $user) use ($roles) {
//                // Se a permissão for um array, verifica se o papel do usuário está dentro
//                if (is_array($roles)) {
//                    return in_array($user->role, $roles);
//                }
//
//                // Caso contrário, verifica normalmente
//                return $user->role === $roles;
//            });
//        }
        // Definição de permissões usando Gates
        Gate::define('viewAny', function (User $user) {
            return in_array($user->role, ['comum', 'admin']);
        });

        Gate::define('view', function (User $user) {
            return in_array($user->role, ['comum', 'admin']);
        });

        Gate::define('create', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('update', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('delete', function (User $user) {
            return $user->role === 'admin';
        });
    }
}
