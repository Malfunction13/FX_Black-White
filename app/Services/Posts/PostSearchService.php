<?php
namespace App\Services\Posts;

use App\Models\Post;

class PostSearchService {

    public function getAllPosts($page = null) { // strong typing int|null makes the ide yell and asks to change config files
        $posts = Post::with( 'user', 'category')->latest()->paginate(10,['*'],'page', $page);

        return $posts;
    }

    public function searchPosts ($search, $page = null) {
        $posts = Post::where('title', "LIKE", "%$search%")->with('category')->latest()
            ->paginate(10,['*'],'page',$page); //default value is null for the paginator page arg

        return $posts;

    }

    public function filterByCategory(int $categoryId, int $page = 1) {
        $posts = Post::where('category_id', "=", $categoryId)->with('category')->latest()
            ->paginate(10,['*'],'page',$page);

        return $posts;
    }
}
