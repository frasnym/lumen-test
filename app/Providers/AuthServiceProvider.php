<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
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
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->header('Authorization')) {
                $idToken = $request->header('Authorization');
                $idToken = explode(' ', $idToken);

                if (count($idToken) == 2) {
                    # $idToken[0] = Bearer
                    # $idToken[1] = token
                    $token = $idToken[1];

                    $user = User::where(['token' => $token])->first();
                    if ($user) {
                        # Save member data on "request object"
                        return $request->user = $user;
                    }
                }
            }
        });
    }
}
