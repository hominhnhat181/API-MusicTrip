@extends('backend.layouts.app')
@section('title')
    Songs
@endsection
@section('content')
    <div id="pages" class="main_contain">
        <div class="main_contain-hover">
            <div class="main_contain-title ">
                <h2>SONGS</h2>
            </div>
            <form class="" id=" sort_user" action="" method="GET">
                <div class="row ">
                    <div class="admin_search col-xl-12 col-md-12">
                        <i class="las la-search search"></i>
                        <input class="admin_search-input" value="{{ request('search') }}" autocomplete="off" name="search"
                            type="text" placeholder="Search...">
                        <div id="objectList"></div>
                    </div>
                    <div class="admin_search col-xl-4 col-md-7" id="alphax">
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
                        <a class="admin_search-btn col-md" href="{{ route('admin.song.index') }}">Reset</a>
                        <a class="admin_search-btn col-md" href="">Excel</a>
                        <a class="admin_search-btn col-md" href="{{ Route('admin.song.create') }}">Create</a>
                    </div>
                </div>
            </form>

            <div class="table_view">
                <div class="table_hover">
                    <table class="table table-hover my-0">
                        <thead class="thead-dark">
                            <tr>
                                <th class="">ID</th>
                                <th>Artists</th>
                                <th>Tracks</th>
                                <th>Image</th>
                                <th>Album</th>
                                <th class="center">Status</th>
                                <th class="center ">Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($songs) && count([$songs]))
                                @foreach ($songs as $song)
                                    <tr class="cms-index">
                                        <td>{{ $song->id }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $song->artists->name }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $song->name }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $song->albums->name }}</td>
                                        <td class="d-none d-xl-table-cell">
                                            <img style="width: 50px;height:50px;border-radius: 50%;"
                                                src="{{ asset($song->image) }}" alt="">
                                        </td>
                                        <td class="center">
                                            @if ($song->status != 1)
                                                <span class="badge bg-danger">Deactive</span>
                                            @else
                                                <span class="badge bg-success">Active</span>
                                            @endif
                                        </td>
                                        <td class="d-none d-md-table-cell center">
                                            <div class="ct ">
                                                <a class="btn btn-soft-primary btn-icon btn-circle go-edit btn-sm"
                                                    href="{{ route('admin.song.edit', $song->id) }}"
                                                    title="{{ translate('Edit') }}">
                                                    <i class="las la-edit"></i>
                                                </a>
                                                <a href="#"
                                                    class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                                    data-href="{{ route('admin.song.destroy', $song->id) }}"
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
            {{ $songs->appends(request()->input())->links('vendor.pagination.default') }}
        </div>
    </div>
@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
    <script>
        // search
        $(document).ready(function() {
            $('.admin_search-input').keyup(function() { //b???t s??? ki???n keyup khi ng?????i d??ng g?? t??? kh??a tim ki???m
                var query = $(this).val(); //l???y g??a tr??? ng d??ng g??
                if (query != '') {

                    $.ajax({
                        url: "{{ route('admin.song.fillSearch') }}", // ???????ng d???n khi g???i d??? li???u ??i 'search' l?? t??n route m??nh ?????t b???n m??? route l??n xem l?? hi???u n?? l?? c??i j.
                        method: "POST", // ph????ng th???c g???i d??? li???u.
                        data: {
                            query: query,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(data) { //d??? li???u nh???n v???
                            $('#objectList').fadeIn();
                            $('#objectList').html(
                            data); //nh???n d??? li???u d???ng html v?? g??n v??o c???p th??? c?? id l?? objectList
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
