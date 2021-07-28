@extends('layouts.app')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection()

@section('content')
    <section class="section posts">
        <div class="container">
            <div class="section-heading d-flex">
                <i class="fas fa-chess-king fa-3x pt-4"></i>
                <div class="col">
                    <div class="heading">Post Management</div>
                </div>
                <i class="fas fa-chess-king fa-3x pt-4 fa-flip-horizontal"></i>
            </div>
        </div>

        @include('admin.adm_menu')

        <section class="section">
            <div class="container ">
                <div class="content-section">
                    <div class="col">
                        @include('layouts.status_info')
                        <div class="col mb-5">
                            <div class="col row align-items-center">
                                <form id="search_by_title_form" action="{{ route('postSearch') }}">
                                    <label class="form-label" for="search">Search by keyword</label>
                                    <div class="d-flex align-items-center">
                                        <input name="search" type="search" id="search" class="form-control col-md-8"/>
                                        <button id="search_by_title" class="search-button  d-flex mx-3" value="">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>

                                <form id="search_by_category_form" class="ml-5" action="{{ route('postByCategory') }}" method="GET">
                                    <label class="form-label" for="filter">Filter by category</label>
                                    <div class="d-flex align-items-center">
                                        <select name="filter" class="form-control col-md-8" id="filter" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                        </select>
                                        <button id="filter_by_category" class="search-button d-flex mx-3" value="">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div id="post-controls">
                                <div id="new_post" class="management-button mt-4">New post</div>
                            </div>
                        </div>
                        @include('admin.post_new')

                        <div class="col-12 d-flex flex-column">
                            <table class="">
                                <thead>
                                <tr><th>Title</th><th>Category</th><th>Created at</th><th>Details</th></tr>
                                </thead>
                                <tbody id="search_results">
                                @foreach($posts as $post)
                                    <tr>
                                        <td>
                                            {{ $post->title }}
                                        </td>
                                        <td>
                                            {{ $post->category->name }}
                                        </td>
                                        <td>
                                            {{ $post->created_at }}
                                        </td>
                                        <td class="white-button py-1">
                                            <a href="{{ route('postDetails', [$post->id]) }}">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col">
                            <label class="form-label font-weight-bold mt-3" for="">Pages</label>
                            <div id="pagination" class="row px-3">
                                {{ $posts->links('vendor.pagination.custom-pagination') }}
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
@endsection
@section('scripts')
    <script type="module" src="{{ URL::asset('assets/js/posts/overview_page/posts_overview_handler.js') }}"></script>
@endsection
