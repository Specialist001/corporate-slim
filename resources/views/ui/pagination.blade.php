@if($data->count() > 0)
    <div class="row table-pagination">
        <div class="col-md-12 text-center">
            <div class="paginate-info text-muted">
                <p>

                    {{trans('admin.pagination.showing')}} {{$data->firstItem()}} {{trans('admin.pagination.to')}} {{$data->lastItem()}} {{trans('admin.pagination.from')}} {{$data->total()}} {{trans('admin.pagination.entries')}}
                </p>
            </div>
        </div>
        <div class="col-md-12 ">
            {{$data->links()}}
        </div>
    </div>
@else
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="paginate-info text-muted">
                {{trans('admin.pagination.no_entries')}}
            </div>
        </div>
    </div>
@endif
