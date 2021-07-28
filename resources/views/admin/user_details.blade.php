@extends('layouts.app')
@section('head')
    <!-- jQuery UI for datepicker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- jQuery UI CSS for datepicker -->
    <link rel='stylesheet' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
@endsection()
@section('content')
    <section class="section posts">
        <div class="container">
            <div class="section-heading d-flex">
                <i class="fas fa-chess-king fa-3x pt-4"></i>
                <div class="col">
                    <div class="heading">User details</div>
                </div>
                <i class="fas fa-chess-king fa-3x pt-4 fa-flip-horizontal"></i>
            </div>
        </div>

        @include('admin.adm_menu')

        <section class="section">
            <div class="container ">
                <div class="content-section">
                    <div id="user-management-dashboard" class="col">

                        @include('layouts.status_info')

                        <div class="mb-5 d-flex align-items-center">
                            <div class="mr-5"><a id="update_user_form" class="management-button" href="">Update user</a></div>
                            <div id="delete_modal" class="mr-5 modal-button" data-toggle="modal" data-target="#global_modal" data-id="{{ $user->id }}">Delete user</div>
                            <form id="activate_user" class="mr-5 white-button" method="POST" action="{{ route('userActivate', [$user]) }}">
                                <input id="activate" type="submit" value="Activate" class="management-button float-right">
                            </form>
                            <div id="extend_modal" class="mr-5 modal-button" data-toggle="modal" data-target="#global_modal" data-id="{{ $user->id }}">Extend</div>
                            <form id="deactivate_user" method="POST" action="{{ route('userDeactivate', [$user]) }}" class="white-button">
                                <input id="deactivate" class="management-button float-right" type="submit" value="Deactivate">
                            </form>
                        </div>
                        <div class="d-flex flex-column">

                            @include('admin.user_info')

                        </div>

                        @include('admin.user_update')

                    </div>

                    </div>
                </div>
                <div id="userId" class="d-none">{{$user->id}}</div>
            </div>
        </section>
        <script>
            $(document).on('focus', '#datepicker', function(){
                $(this).datepicker({
                    dateFormat: 'dd-mm-yy',
                });
            });
        </script>
        <script type="module" src="{{ URL::asset('assets/js/users/details_page/user_details_handler.js') }}"></script>
        <script type="module" src="{{ URL::asset('assets/js/users/details_page/modal_handler.js') }}"></script>
@endsection
