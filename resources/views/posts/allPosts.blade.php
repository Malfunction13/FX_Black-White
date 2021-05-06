@extends('layouts.app')

@section('content')
    <section>
        @foreach($posts as $post)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </section>



@endsection
