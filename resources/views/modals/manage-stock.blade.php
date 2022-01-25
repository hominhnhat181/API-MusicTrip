<div class="modal fade modal-manage-stock" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form enctype="multipart/form-data" method="POST" action="{{route('admin.products.managet-stock.upload')}}" class="modal-content p-4">
            @csrf
            <h5 class="mb-4 pb-3 border-bottom">{{__('Manage stock')}}</h5>
            <div class="data-table">
                <p class="d-flex align-items-center">
                    <span class="font-20 mr-2  text-rehau"><i class="las la-cloud-download-alt"></i></span>
                    <a href="{{route('admin.products.managet-stock.download')}}" class="font-16 text-rehau">{{__('Download manage stock csv format')}}</a>
                </p>
                <p class="d-flex align-items-center">
                    <span class="font-20 mr-2  text-rehau"><i class="las la-cloud-download-alt"></i></span>
                    <a href="{{route('admin.products.managet-stock.download')}}?is_excel" class="font-16 text-rehau">{{__('Download manage stock excel format')}}</a>
                </p>
                <div class="d-flex align-items-baseline">
                    <span class="font-20 mr-2  text-rehau"><i class="las la-cloud-upload-alt"></i></span>
                    <label class="" for="file-stock">
                        <p class="font-16 text-rehau cur-pointer mb-2">{{__('Upload manage stock file')}}</p>
                        <input type="file" name="file" id="file-stock" accept=".csv,.xlsx"/>
                        @error('file')
                        <p class="text-danger mb-0 mt-2">{{$message}}</p>
                        @enderror
                    </label>
                </div>
            </div>
            <div class="mt-4 d-flex justify-content-between">
                <button type="button" class="btn btn-secondary reset" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-secondary reset">Submit</button>
            </div>
        </form>
    </div>
</div>