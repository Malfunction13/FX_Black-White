<?php
namespace App\Services\Posts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Throwable;


class PostManagementService {

    public function createPost(Request $request) {
        Post::create([
            'user_id' => $request->user()->id,
            'category_id' => $request->category,
            'title' => $request->title,
            'text' => $request->text,
            'slug' => Str::slug($request->title),
            'img_name' => $this->storeImage($request)
        ]);
    }

    public function updatePost(Request $request, Post $post) : Model {
        $data = array_filter($request->except('_token', '_method', 'id'));
        if ($request->file('image')) {
            $data['img_name'] = $this->storeImage($request);
        }
        $post->update($data);

        return Post::with( 'user', 'category')->find($post->id);
    }

    public function deletePost(Post $post) {
        $post->delete();
    }

    public function storeImage(Request $request) : string {
        $file = $request->file('image');
        $newImgName = uniqid("") . "." . $file->getClientOriginalExtension();
        $newImg = Image::make($file);
        $newImg->stream(); //magic happens here
        Storage::disk('post-images')->put($newImgName, $newImg);

        return $newImgName;
    }
}
