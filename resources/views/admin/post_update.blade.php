<div id="update_post_menu" class="form-section d-none">
    <div class="col pb-5 d-flex justify-content-center"><h4>Update post</h4></div>
    <div class="col">
        <form id="update_post_form" class="row justify-content-center px-6" action="{{ route('postUpdate', [$post]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <input type="hidden" name="id" value={{ $post->id }}>
            <div class="col-md-6 align-items-center">
                <div class="col">
                    <label for="category">Category</label>
                    <div class="mb-3">
                        <select name="category_id" class="form-control" id="category" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ ($post->category->id === $category->id) ? "selected" : "" }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="text-red mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <label for="title">Title</label>
                    <div class="mb-3">
                        <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}" required>
                        @error('title')
                        <div class="text-red mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <label for="text">Text</label>
                    <div class="mb-3">
                        <textarea type="text" name="text" class="form-control" id="text" required>{{ $post->text }}</textarea>
                        @error('text')
                        <div class="text-red mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                </div>
                <div class="col">
                    <label for="image">Image (max 2mb)</label>
                    <div class="mb-3">
                        <input id="image" type="file" name="img_name" class="w-100 btn-dark rounded p-2">
                        @error('image')
                        <div class="text-red mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <input id="update_post" type="submit" value="Update" class="management-button mt-3">
                </div>
            </div>
        </form>
    </div>
</div>
