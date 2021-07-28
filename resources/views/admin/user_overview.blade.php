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
                    <div class="heading">User Management</div>
                </div>
                <i class="fas fa-chess-king fa-3x pt-4 fa-flip-horizontal"></i>
            </div>
        </div>

        @include('admin.adm_menu')

        <section class="section">
            <div class="container ">
                <div class="content-section">
                    <div class="col status-info">
                        @if(session('error'))
                            <div class="col-6 alert alert-danger mb-5 text-sm">
                                {{ session('error') }}
                            </div>
                        @elseif(session('status'))
                            <div class="col-6 alert alert-success mb-5 text-sm">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    <div class="col">
                        <div class="col mb-5">
                            <form id="search_by_name_mail" action="{{ route('userSearch') }}" method="GET">
                                <label class="form-label" for="search">Search users</label>
                                <div class="d-flex align-items-center">
                                    <input name="search" type="search" id="search" class="col-md-3 form-control"/>
                                    <select name="criteria" class="form-control col-md-2 mx-4" id="criteria" required>
                                        <option value="email">Email</option>
                                        <option value="username">Username</option>
                                    </select>
                                    <button id="users_search" class="search-button d-flex mx-3" value="">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            <form id="search_by_filter" action="{{ route('filteredSearch') }}" method="GET">
                                <label class="form-label" for="filter">Filtered search</label>
                                <div class="d-flex align-items-center">
                                    <select name="filter" class="form-control col-md-2 mr-4" id="filter" required>
                                        <option value="subscribed">Subscribed</option>
                                        <option value="unsubscribed">Not subscribed</option>
                                        <option value="subscriptions">Most subscriptions</option>
                                        <option value="latest">Latest</option>
                                        <option value="oldest">Oldest</option>
                                    </select>
                                    <button id="filtered_search" class="search-button d-flex mx-3" value="">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 d-flex flex-column">
                            <table>
                                <thead>
                                    <tr><th>Username</th><th>Email</th><th>Subscribed</th><th>Subscription count</th><th>Joined at</th><th>Details</th></tr>
                                </thead>
                                <tbody id="search_results">
                                @foreach($users as $user)
                                    <tr>
                                        <td id="username">
                                            {{ $user->username }}
                                        </td>
                                        <td id="email">
                                            {{ $user->email }}
                                        </td>
                                        @if ($user->subscribed)
                                            <td id="subscribed" class="text-success font-weight-bold">
                                                True
                                            </td>
                                        @else
                                            <td id="subscribed" class="text-danger font-weight-bold">
                                                False
                                            </td>
                                        @endif
                                        <td id="subscription_count">
                                            {{ $user->subscription_count }}
                                        </td>
                                        <td id="joined_date">
                                            {{ $user->created_at }}
                                        </td>
                                        <td class="white-button py-1">
                                            <a href="{{ route('userDetails', [$user->id]) }}">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col">
                            <label class="form-label font-weight-bold mt-3" for="">Pages</label>
                            <div id="pagination" class="row px-3">
                                {{ $users->links('vendor.pagination.custom-pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection

@section('scripts')
    <script type="module" src="{{ URL::asset('assets/js/users/overview_page/users_overview_handler.js') }}"></script>
@endsection
