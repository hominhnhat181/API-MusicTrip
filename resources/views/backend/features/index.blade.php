@extends('backend.layouts.app')
@section('title')
    Features
@endsection
@section('content')
    <div id="pages" class="main_contain">
        <div class="main_contain-hover">
            <div class="main_contain-title ">
                <h2>Features</h2>
            </div>
            <form class="" id=" sort_user" action="" method="GET">
                <div class="row ">
                    <div class="admin_search col-xl-12 col-md-12">
                        <i class="las la-search search"></i>
                        <input class="admin_search-input" value="{{ request('search') }}" autocomplete="off" name="search"
                            type="text" placeholder="Search..." >
                        <div id="objectList"></div>
                    </div>
                    <div class="admin_search col-xl-4 col-md-7" id="alphax">
                        {{-- <i class="material-icons more">expand_more</i> --}}
                        <i class="las la-calendar-alt more"></i>
                        <input id="datepicker" class="admin_search-chose" id="joined_date" name="joined_date"
                            value="{{ request('joined_date') }}" autocomplete="off" placeholder="Date">
                    </div>
                    <div class="admin_search col-xl-3 col-md-5" id="alphay">
                        <select class="admin_search-chose aiz-selectpicker form-control" id="select_user" name="status">
                            <option selected value="">-- Status --</option>
                            <option value="1" {{ request('status') == 1 ? 'selected' : '' }}>Active</option>
                            <option value="2" {{ request('status') == 2 ? 'selected' : '' }}>Deactive</option>
                        </select>
                    </div>
                    <?php
                    $request = request()->all();
                    $newRequest = http_build_query($request);
                    ?>
                    <div class="admin_search col-xl-5 col-md-12 row" id="omega">
                        <button type="submit" class="admin_search-btn col-md" href="">Search</button>
                        <a class="admin_search-btn col-md" href="{{ route('admin.feature.index') }}">Reset</a>
                        <a class="admin_search-btn col-md" href="">Excel</a>
                        <a class="admin_search-btn col-md" href="{{ Route('admin.feature.create') }}">Create</a>
                    </div>
                </div>
            </form>

            <div class="table_view">
                <div class="table_hover">
                    <table class="table table-hover my-0">
                        <thead class="thead-dark">
                            <tr>
                                <th class="first-column">ID</th>
                                <th>Name</th>
                                <th class="center">Created at</th>
                                <th class="center">Status</th>
                                <th class="center" width=11%>Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($features) && count([$features]))
                                @foreach ($features as $feature)
                                    <tr class="cms-index">
                                        <td class="first-column">{{ $feature->id }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $feature->name }}</td>
                                        <td class="d-none d-xl-table-cell center">{{ $feature->created_at->format('d-m-Y') }}</td>
                                        <td class="center">
                                            <a href="{{route('admin.feature.status',  $feature->id)}}" data-toggle="modal"
                                                data-target="#ModalCenterS{{ $feature->id }}">
                                                @if ($feature->status != 1)
                                                    <button type="submit" class="badge bg-danger">Deactive</button>
                                                @else
                                                    <button type="submit" class="badge bg-success">Active</button>
                                                @endif
                                            </a>
                                        </td>
                                        <td class="d-none d-md-table-cell center">
                                            <div class="ct ">
                                                <a class="btn btn-soft-primary btn-icon btn-circle go-edit btn-sm"
                                                    href="{{ route('admin.feature.edit', $feature->id) }}"
                                                    title="{{ translate('Edit') }}">
                                                    <i class="las la-edit"></i>
                                                </a>
                                                <a href="#"
                                                    class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                                    data-href="{{ route('admin.feature.destroy', $feature->id) }}"
                                                    title="{{ translate('Delete') }}">
                                                    <i class="las la-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $features->appends(request()->input())->links('vendor.pagination.default') }}
        </div>
    </div>

    @foreach ($features as $feature)
<!-- Modal status-->
<div class="modal fade" id="ModalCenterS{{ $feature->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Change Status Feature</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure about that?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{ Route('admin.feature.status', $feature->id) }}"><button type="button"
                        class="btn btn-primary">Save changes</button></a>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
    <script>
        // search
        $(document).ready(function() {
            $('.admin_search-input').keyup(function() { 
                var query = $(this).val(); 
                if (query != '') {

                    $.ajax({
                        url: "{{ route('admin.feature.fillSearch') }}", 
                        method: "POST", // 
                        data: {
                            query: query,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(data) { 
                            $('#objectList').fadeIn();
                            $('#objectList').html(data); 
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
            $(document).on('click', '.fill_search li', function() {
                $('.admin_search-input').val($(this).text());
                $('#objectList').fadeOut();
            });
            $(document).on('click', '#pages', function() {
                $('#objectList').fadeOut();
            });
        });
    </script>

@endsection
