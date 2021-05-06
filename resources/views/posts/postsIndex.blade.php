@extends('layouts.app')

@section('content')
    <main class="row justify-content-center">
    @include('layouts.prices_widget')
    <!-- MAIN CONTENT -->
        <section class="section content-section">
            <div class="container">
                <form action="{{ route('createPost') }}" method="post" class="row justify-content-center px-6" enctype="multipart/form-data">
                    @csrf
                    <div class="column-flex align-items-center">
                        @if (session()->has('status'))
                            <div class="d-flex justify-content-center mb-3">
                                {{ session('status') }}
                            </div>
                        @endif
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
                                <input type="file" name="image" class="btn-dark rounded p-2" id="image" required>
                                @error('image')
                                <div class="text-red mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>



                        <div class="d-flex justify-content-center">
                            <input type="submit" value="Post" class="register-btn mt-3">
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </main>
@endsection()
