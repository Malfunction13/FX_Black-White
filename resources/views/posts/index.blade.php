@extends('layouts.app')

@section('content')
    <main class="row justify-content-center">
        @include('layouts.prices_widget')
        <!-- MAIN CONTENT -->
        <section class="section posts">
            <div class="container">
                <div class="section-heading d-flex">

                    <div class="col">
                        <div class="heading"><i class="fas fa-chess-queen px-5"></i>Welcome to FX Black & White<i class="fas fa-chess-queen px-5"></i></div>
                        <div class="description">Daily Financial Markets analysis, Forex calendar and highly accurate signals</div>
                    </div>

                </div>
            </div>
            <div class="container">
                @foreach ($posts as $post)
                    @if($loop->iteration % 2 === 0)
                        <!-- Right aligned img -->
                        @include('layouts.right_image_post')
                    @else
                        <!-- Left aligned img -->
                        @include('layouts.left_image_post')
                    @endif
                @endforeach
                @if ($posts->hasPages())
                <div class="content-section">
                    <div class="d-flex w-100 justify-content-center">
                        {{ $posts->links('vendor.pagination.custom-pagination') }}
                    </div>
                </div>
                @endif
            </div>
        </section>
    </main>
@endsection()
