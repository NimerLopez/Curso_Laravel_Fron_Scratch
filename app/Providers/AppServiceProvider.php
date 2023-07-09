<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Newsletter;
use App\Services\MailchimpNewsletter;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    app()->bind(Newsletter::class, function () {
      $client = new ApiClient();

      $client->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us17'
      ]);
      return new MailchimpNewsletter($client);
    });
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    Model::unguard();
    
    Gate::define('admin', function (User $user) {
        return $user->username === 'Nimerxxx';
    });

    Blade::if('admin', function () {
        return optional(request()->user())->can('admin');
    });
  }
}