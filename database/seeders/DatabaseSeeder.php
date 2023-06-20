<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

      // User::truncate();
      // Post::truncate();
      // Category::truncate();

      Post::factory()->create();//genera los datos
         // $user=User::factory()->create();
         // $personal=Category::create([
         //    'name'=>'Personal',
         //    'slug'=>'personal',
         // ]);

         // $family=Category::create([
         //    'name'=>'Family',
         //    'slug'=>'famyly',
         // ]);
         // $work=Category::create([
         //    'name'=>'Work',
         //    'slug'=>'work',
         // ]);

         // Post::create([
         //    'user_id'=>$user->id,
         //    'category_id'=>$family->id,
         //    'title'=>'Mi Familia Post',
         //    'slug'=>'my-first-post',
         //    'excerpt'=>'<p>Lorem ipsum dolor</p>',
         //    'body'=>'<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet, quae quam. Perspiciatis quae ut laudantium molestias expedita voluptas corrupti sint pariatur! Ex, unde facilis alias doloribus dolorum ipsa voluptatem quae.</p>'
         // ]);

         // Post::create([
         //    'user_id'=>$user->id,
         //    'category_id'=>$work->id,
         //    'title'=>'Mi Trabajo Post',
         //    'slug'=>'my-work-post',
         //    'excerpt'=>'<p>Lorem ipsum dolor</p>',
         //    'body'=>'<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet, quae quam. Perspiciatis quae ut laudantium molestias expedita voluptas corrupti sint pariatur! Ex, unde facilis alias doloribus dolorum ipsa voluptatem quae.</p>'
         // ]);

    }
}
