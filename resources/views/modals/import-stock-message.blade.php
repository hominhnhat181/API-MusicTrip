<?php 
    $error = $dataImport['error'] ?? [];
    $success = $dataImport['success'];
?>
<div class="modal fade modal-after-import modal-scroll" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <h5 class="mb-3 pb-3 border-bottom">{{__('Result After Import')}}</h5>
            <div class="data-table">
                <h5 class="text-success">{{__('Success')}}: {{$success}} ({{__('Records')}})</h5>
                <h5 class="text-danger">{{__('Failed')}}: {{count($error)}} ({{__('Records')}})</h5>
                @if(count($error))
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="75px" class="text-center">{{__('Row')}}</th>
                            <th width="200px" class="text-center">{{__('Product code')}}</th>
                            <th>{{__('Message Failed')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($error as $key => $item)
                            <tr>
                                <td class="text-center">{{$key}}</td>
                                <td class="text-center">{{$item['product_code']}}</td>
                                <td class="pre-line">{!! $item['message'] !!}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                @endif
            </div>
            <div class="">
                <button type="button" class="btn btn-secondary reset mt-4" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>