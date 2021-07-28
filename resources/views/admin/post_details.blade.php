@extends('layouts.app')

@section('content')
<div class="container">
    <div class="section-heading d-flex">
        <i class="fas fa-chess-king fa-3x pt-4"></i>
        <div class="col">
            <div class="heading">Post details</div>
        </div>
        <i class="fas fa-chess-king fa-3x pt-4 fa-flip-horizontal"></i>
    </div>
</div>
@include('admin.adm_menu')

<div class="container">
    <div class="content-section">
        <div class="col">
            @include('layouts.status_info')
            <div class="row justify-content-start mb-5 px-3">
                <div id="update_form" class="management-button">Update post</div>
                <div id="delete_modal" class="modal-button mx-4" data-toggle="modal" data-target="#global_modal" data-id="{{ $post->id }}">Delete post</div>
            </div>
            <div class="col-12 d-flex flex-column">
                <table>
                    <thead>
                    <tr><th>Author</th><th>Category</th><th>Posted at</th><th>Last update</th></tr>
                    </thead>
                    <tbody id="post_info">
                        <tr>
                            <td id="author">
                                {{ $post->user->username }}
                            </td>
                            <td id="category">
                                {{ $post->category->name }}
                            </td>
                            <td id="created_at">
                                {{ $post->created_at }}
                            </td>
                            <td id="updated-at">
                                {{ $post->updated_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @include('admin.post_update')

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="left-image">
                    <img id="img" src="{{ URL::asset('assets/images/' . $post->img_name) }}" alt="" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-text text-break text-wrap">
                    <h4 id="post_title" class="">{{ $post->title }}</h4>
                    <p id="post_text">
                        {!! nl2br(e($post->text)) !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()

@section('scripts')
    <script type="module" src="{{ URL::asset('assets/js/posts/details_page/post_details_handler.js') }}"></script>
    <script type="module" src="{{ URL::asset('assets/js/posts/details_page/modal_handler.js') }}"></script>
@endsection
