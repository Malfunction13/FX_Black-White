<div id="new_post_menu" class="form-section d-none">
    <div class="col pb-5 d-flex justify-content-center"><h4>Create new post</h4></div>
    <div class="col">
        <form id="new_post_form" class="row justify-content-center px-6" action="{{ route('postCreate') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 align-items-center">
                <div class="col">
                    <label for="category">Category</label>
                    <div class="mb-3">
                        <select name="category" class="form-control" id="category" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                        <input type="text" name="title" class="form-control" id="title" required>
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
                        <textarea type="text" name="text" class="form-control" id="text" required></textarea>
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
                        <input id="image" type="file" name="image" class="w-100 btn-dark rounded p-2" required>
                        @error('image')
                        <div class="text-red mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <input id="create_post" type="submit" value="Post" class="management-button mt-3">
                </div>
            </div>
        </form>
    </div>
</div>
