<div class="content-section">
    <div class="row">
        <div class="col-md-6">
            <div class="left-image">
                <div class="w-100 d-flex justify-content-between pb-2">
                    <div>{{ date('d-M-Y', strtotime($post->created_at)) }}</div>
                    <div>{{ $post->category->name }}</div>
                </div>
                <img class="thumbnail" src="{{ URL::asset('assets/images/' . $post->img_name) }}" alt="" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="right-text text-break text-wrap">
                <h4><a href="{{ route('singlePost', [$post->slug]) }}">{{ $post->title }}</a></h4>
                <p class="text-preview">
                    {{ $post->text }}
                </p>
                <div class="white-button text-right mt-4">
                    <a href="{{ route('singlePost', [$post->slug]) }}">Read more</a>
                </div>
            </div>
        </div>
    </div>
</div>
