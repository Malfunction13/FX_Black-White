@extends('layouts.app')

@section('content')
    <section class="section posts">
        <div class="container">
            <div class="section-heading d-flex">
                <i class="fas fa-chess-king fa-3x pt-4"></i>
                <div class="col">
                    <div class="heading">Category management</div>
                </div>
                <i class="fas fa-chess-king fa-3x pt-4 fa-flip-horizontal"></i>
            </div>
        </div>

        @include('admin.adm_menu')

        <section class="section">
            <div class="container ">
                <div class="content-section">
                    <div class="col">
                        @include('layouts.status_info')
                        <div class="d-flex mb-5">
                            <div class="col">
                                <div class="d-flex admin-menu">
                                    <button id="create_category" class="modal-button my-1" data-toggle="modal" data-target="#global_modal">New category</button>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex flex-column">
                            <table>
                                <thead><tr><th>Name</th><th>Created at</th><th>Updated at</th><th></th><th></th></tr></thead>
                                <tbody id="category_list">
                                @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td>
                                            {{ $category->created_at }}
                                        </td>
                                        <td>
                                            @if ($category->created_at == $category->updated_at)
                                                Same
                                            @else
                                                {{ $category->updated_at }}
                                            @endif
                                        </td>
                                        <td>
                                            <button id="update_category_{{ $category->id }}" class="modal-button my-1" data-toggle="modal" data-id="{{ $category->id }}" data-target="#global_modal">Update</button>
                                        </td>
                                        <td>
                                            <button id="delete_category_{{ $category->id }}" class="modal-button my-1" data-toggle="modal" data-id="{{ $category->id }}" data-target="#global_modal">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
@section('scripts')
    <script type="module" src="{{ URL::asset('assets/js/categories/categories_overview_handler.js') }}"></script>
    <script type="module" src="{{ URL::asset('assets/js/categories/modal_handler.js') }}"></script>

@endsection
