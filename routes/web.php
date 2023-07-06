<?php
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;

use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Models\Category;
use MailchimpMarketing\ApiClient;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('newsletter', function () {
  request()->validate(['email' => 'required|email']);
  
  $mailchimp = new \MailchimpMarketing\Apiclient();
  $mailchimp->setConfig([
      'apiKey' => config('services.mailchimp.key'),
      'server' => 'us17'
  ]);
  try {
    
  $response = $mailchimp->lists->addListMember('ab21b4a70e', [
      'email_address' => request('email'),
      'status' => 'subscribed'
  ]);
}catch(Exception $e){
  throw ValidationException::withMessages([
    'email' => 'This email could not be added to our newsletter list.'
]);
}

  return redirect('/')->with('success', '¡Ahora estás suscrito a nuestro boletín!');
});


Route::get('/',[PostsController::class, 'index'])->name('home');
Route::get('posts/{post:slug}',[PostsController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);


Route::get('register',[RegisterController::class, 'create'])->middleware('guest');
Route::post('register',[RegisterController::class, 'store'])->middleware('guest');

Route::get('login',[SessionsController::class, 'create'])->middleware('guest');
Route::post('login',[SessionsController::class, 'store'])->middleware('guest');
Route::post('logout',[SessionsController::class, 'destroy'])->middleware('auth');

