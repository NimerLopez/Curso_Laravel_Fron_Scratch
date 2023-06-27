<?php
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\PostsController;

use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Models\Category;
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

Route::get('/',[PostsController::class, 'index'])->name('home');
Route::get('posts/{post:slug}',[PostsController::class, 'show']);

// Route::get('categories/{category:slug}', function (Category $category) {
//     return view('posts',[
//         'posts'=>$category->posts,
//         'currentCategory'=> $category,
//         'categories'=>Category::all()
//     ]);
// })->name('categories');

Route::get('authors/{author:username}', function (User $author) {
    
    return view('posts', [
        'posts' => $author->posts
    ]);
});
