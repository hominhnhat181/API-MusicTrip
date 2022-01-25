@extends('backend.layouts.app')
@section('title')
    Users
@endsection
@section('content')
    <div id="pages" class="main_contain">
        <div class="main_contain-hover">
            <div class="main_contain-title ">
                <h2>USERS</h2>
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
                        <select class="admin_search-chose aiz-selectpicker form-control" id="select_user" name="admin">
                            <option selected value="">-- Status --</option>
                            <option value="2" {{ request('admin') == 2 ? 'selected' : '' }}>Customer</option>
                            <option value="1" {{ request('admin') == 1 ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                    <?php
                    $request = request()->all();
                    $newRequest = http_build_query($request);
                    ?>
                    <div class="admin_search col-xl-5 col-md-12 row" id="omega">
                        <button type="submit" class="admin_search-btn col-md" href="">Search</button>
                        <a class="admin_search-btn col-md" href="{{ route('admin.user.index') }}">Reset</a>
                        <a class="admin_search-btn col-md" href="">Excel</a>
                        <a class="admin_search-btn col-md" href="{{ Route('admin.user.create') }}">Create</a>
                    </div>
                </div>
            </form>

            <div class="table_view">
                <div class="table_hover">
                    <table class="table table-hover my-0">
                        <thead class="thead-dark">
                            <tr>
                                <th class="">ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Email</th>
                                <th>Created at</th>
                                <th class="center ">Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($users) && count([$users]))
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $user->name }}</td>
                                        <td class="d-none d-xl-table-cell">
                                            <img style="width: 50px; height:50px" src="{{ asset($user->image) }}" alt="">
                                        </td>
                                        <td class="d-none d-xl-table-cell">{{ $user->email }}</td>
                                        <td>
                                        @if ($user->status == 1)
                                            <span class="badge bg-success">Admin</span>
                                        @else
                                            <span class="badge bg-danger">Customer</span>
                                        @endif
                                        </td>
                                        <td class="d-none d-xl-table-cell">{{ $user->created_at->toDateString() }}</td>
                                        {{-- <td class="d-none d-md-table-cell center">
                                            <div class="ct ">
                                                <a class="btn btn-soft-primary btn-icon btn-circle go-edit btn-sm"
                                                    href="{{ route('admin.user.edit', $user->id) }}"
                                                    title="{{ translate('Edit') }}">
                                                    <i class="las la-edit"></i>
                                                </a>
                                                <a href="#"
                                                    class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                                    data-href="{{ route('admin.user.destroy', $user->id) }}"
                                                    title="{{ translate('Delete') }}">
                                                    <i class="las la-trash"></i>
                                                </a>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $users->appends(request()->input())->links('vendor.pagination.default') }}
        </div>
    </div>

    

@section('modal')
    @include('modals.delete_modal')
@endsection

@endsection

@section('script')
    <script>
        // search
        $(document).ready(function() {
            $('.admin_search-input').keyup(function() { //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
                var query = $(this).val(); //lấy gía trị ng dùng gõ
                if (query != '') {

                    $.ajax({
                        url: "{{ route('admin.user.fillSearch') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                        method: "POST", // phương thức gửi dữ liệu.
                        data: {
                            query: query,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(data) { //dữ liệu nhận về
                            $('#objectList').fadeIn();
                            $('#objectList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là objectList
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText); // Save time
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
