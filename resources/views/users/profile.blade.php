@extends('layouts.app')

@section('content')
<div class="container">
    <div class="section-heading d-flex">
        <i class="fas fa-chess-king fa-3x pt-4"></i>
        <div class="col">
            <div class="heading">User profile</div>
            <div class="description">Welcome {{ auth()->user()->username }}, your subscription is {{ auth()->user()->subscribed ? 'active.' : 'inactive.' }}</div>
        </div>
        <i class="fas fa-chess-king fa-3x pt-4 fa-flip-horizontal"></i>
    </div>
</div>
<div class="container">
    <div class="content-section">
        <div class="col">

            @include('layouts.status_info')

            <div class="mb-5 d-flex align-items-center">
                <div id="change_pwd_modal" class="modal-button mr-4" data-toggle="modal" data-target="#global_modal" data-id="{{ $user->id }}">Change password</div>
                <div id="change_email_modal" class="modal-button mx-4" data-toggle="modal" data-target="#global_modal" data-id="{{ $user->id }}">Change email</div>
                <div id="extend_modal" class="modal-button mx-4" data-toggle="modal" data-target="#global_modal" data-id="{{ $user->id }}">Extend subscription</div>
            </div>

            @include('layouts.profile_info')

        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="module" src="{{ URL::asset('assets/js/profile/profile_overview_handler.js') }}"></script>
    <script type="module" src="{{ URL::asset('assets/js/profile/modal_handler.js') }}"></script>
@endsection
