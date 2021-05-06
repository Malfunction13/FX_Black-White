@extends('layouts.app')

@section('content')
    PROFILE PAGE {{ auth()->user()->username }}

    <form action="{{ route('createCategory') }}" method="post" class="row justify-content-center px-6">
        @csrf
        <div class="form-row justify-content-center register">
            <div class="register-top col-md-6">
                <label for="name">New category name</label>
                <input type="text" name="name" id="name"  required>
            </div>
            <input type="submit" value="Create" class="register-btn mt-3">
        </div>

    </form>

@endsection
