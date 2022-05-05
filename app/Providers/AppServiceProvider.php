<?php

namespace App\Providers;

use App\Models\User;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
        app()->bind( Newsletter::class, function () {
            $client = new ApiClient();

            $client->setConfig( [
                'apiKey' => config( 'services.mailchimp.key' ),
                'server' => 'us9'
            ] );

            return new MailchimpNewsletter( $client );
        } );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Model::unguard();

        Gate::define( 'admin', function ( User $user ) {
            return $user->username == 'johndoe11';
        } );

        Blade::if('admin', function() {
            return request()->user()?->can('admin');
        });
    }
}
