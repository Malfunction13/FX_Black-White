<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\DeletePostRequest;
use App\Http\Requests\Post\StorePostRequest;
use App\Services\Posts\PostSearchService;
use App\Services\Posts\PostManagementService;
use File;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\View\View;
use Throwable;


class PostManagementController extends Controller
{
    public function postOverview(Request $request, PostSearchService $postSearchService) {
        if ($request->ajax()) { //pagination requests
            try {
                $posts = $postSearchService->getAllPosts(intval($request->query('page')));

                return response()->json(['data' => $posts, 'status' => 'success',
                    'message' => "Search complete, total {$posts->total()} results!"], 200);
            } catch (Throwable $e) {

                return response()->json([
                    'status' => 'error',
                    'message' => 'Unexpected error, try again later or contact administration.',
                ], 500);
            }
        }
        $posts = $postSearchService->getAllPosts();
        $categories = Category::all();

        return view('admin.post_overview', compact('posts', 'categories'));
    }

    public function postSearch(Request $request, PostSearchService $postSearchService) {
        try {
            $posts = $postSearchService->searchPosts($request->query('search'),
                $request->query('page'));

            return response()->json(['data' => $posts, 'status' => 'success',
                'message' => "Search complete, total {$posts->total()} results!"], 200);
        } catch (Throwable $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Unexpected error, try again later or contact administration.',
            ], 500);
        }
    }

    public function postByCategory(Request $request, PostSearchService $postSearchService) {
        try {
            $posts = $postSearchService->filterByCategory(intval($request->query('filter')),
                intval($request->query('page')));

            return response()->json(['data' => $posts, 'status' => 'success',
                'message' => "Search complete, total {$posts->total()} results!"]);
        } catch (Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unexpected error, try again later or contact administration.',
            ], 500);
        }
 }

    public function postDetails(Post $post) {
        $categories = Category::all();

        return view('admin.post_details', ['post' => $post, 'categories' => $categories]);
    }

    public function postCreate(StorePostRequest $request, PostManagementService $postManagementService) {
        if ($request->ajax()) {
            try {
                $postManagementService->createPost($request);
                return response()->json(['status' => 'success', 'message' => 'Post created!'], 200);

            } catch (Throwable $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unexpected error, try again later or contact administration.',
                ], 500);
            }
        }
    }

    public function postUpdate(StorePostRequest $request, Post $post, PostManagementService $postManagementService) {
        try {
            $updatedPost = $postManagementService->updatePost($request, $post);

            return response()->json(['data' => $updatedPost, 'status' => 'success',
                'message' => 'Post updated!'], 200);
        } catch (Throwable $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Unexpected error, try again later or contact administration.',
            ], 500);
        }

    }


    public function postDelete(DeletePostRequest $request, Post $post) {
        try {
            $post->delete();
            File::delete(asset('assets/images/' . $post->img_name));

            return redirect()->route('postOverview')->with(['status' => 'Post deleted successfully!']);
        } catch (Throwable $e) {

            return redirect()->back()->with(
                ['error' => 'Unexpected error, try again later or contact administration.'], 500
            );
        }
    }
}



