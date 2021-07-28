<?php


namespace App\Http\Controllers;


use App\Models\Post;
use App\Services\Posts\PostSearchService;
use Illuminate\Http\Request;

class IndexController
{
    public function index(Request $request, PostSearchService $postSearchService) {
        $posts = $postSearchService->getAllPosts(intval($request->query('page')));

        return view('posts.index', ['posts' => $posts]);
    }

    public function singlePost(Request $request, Post $post) {

        return view('posts.single_post', ['post' => $post]);
    }

    public function calendar() {

        return view('calendar.fxCalendar');
    }

    public function subscribeDetails(Request $request) {

        return view('subscribe.subscribe_landing');
    }
}
