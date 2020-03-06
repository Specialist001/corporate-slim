@if($data->count() > 0)
    <div class="row table-pagination">
        <div class="col-md-12 text-center">
            <div class="paginate-info text-muted">
                <p>

                    {{trans('pagination.showing')}} {{$data->firstItem()}} {{trans('pagination.to')}} {{$data->lastItem()}} {{trans('pagination.from')}} {{$data->total()}} {{trans('pagination.entries')}}
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
                {{trans('pagination.no_entries')}}
            </div>
        </div>
    </div>
@endif
