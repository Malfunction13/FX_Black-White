@extends('layouts.app')

@section('content')
    <section class="section posts">
        <div class="container">
            <div class="section-heading d-flex">
                <i class="fas fa-chess-king fa-3x pt-4"></i>
                <div class="col">
                    <div class="heading">Adminstrator Management</div>
                </div>
                <i class="fas fa-chess-king fa-3x pt-4 fa-flip-horizontal"></i>
            </div>
        </div>
        @include('admin.adm_menu')
        <section class="section">
            <div class="container ">
                <div class="content-section">
                    <div class="col-12 d-flex flex-column">
                        <table>
                            <thead>
                            <tr><th>Username</th><th>Email</th><th>Role</th><th>Details</th></tr>
                            </thead>
                            <tbody id="search_results">
                            @foreach($admins as $admin)
                                <tr>
                                    <td id="username">
                                        {{ $admin->username }}
                                    </td>
                                    <td id="email">
                                        {{ $admin->email }}
                                    </td>
                                    <td id="role">
                                        @if ($admin->role === 0)
                                            User
                                        @elseif($admin->role === 1)
                                            Moderator
                                        @else
                                            Administrator
                                        @endif
                                    </td>
                                    <td class="white-button py-1">
                                        <a href="{{ route('userDetails', [$admin->id]) }}">Details</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection()
