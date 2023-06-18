<?php

namespace App\Models;
use Illuminate\Support\Facades\File;

class Post
{
    public static function all()
    {
        $files=File::files(resource_path("posts/"));
      return  array_map(function ($files){
            return $files->getContents();
        },$files);

    }
    public static function find($slug)
    {
        base_path();
        //$path = __DIR__ . "/../resources/posts/{$slug}.html";
        if (!file_exists($path=resource_path("posts/{$slug}.html"))) {
            //return redirect('/');
            throw new ModelNotFoundException();
         }
        return cache()->remember("posts.{$slug}", 5, function() use ($path) {
        var_dump('file_get_contents');
        return file_get_contents($path);
        });       
    }
}