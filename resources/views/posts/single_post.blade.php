@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-section">
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="left-image">
                        <div class="w-100 d-flex justify-content-between pb-2">
                            <div>{{ date('d-M-Y', strtotime($post->created_at)) }}</div>
                            <div>{{ $post->category->name }}</div>
                        </div>
                        <img id="img" class="thumbnail" src="{{ URL::asset('assets/images/' . $post->img_name) }}" alt=""
                             data-toggle="modal" data-target="#image_modal"/>
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

    @include('layouts.image_zoom_modal')

@endsection
