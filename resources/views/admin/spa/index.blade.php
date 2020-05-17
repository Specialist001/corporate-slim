@extends('admin.layout')

@section('center_content')
<div class="col-md-12">
	@component('component.white-box', ['title' => trans('admin.titles.all_news')])
		
	    <div id="app">
		<div class="panel-body table-responsive">
			<router-view name="newsIndex"></router-view>
			<router-view></router-view>
		</div>
		</div>
		
        {{-- @slot('bottom')
    		@include('common.pagination', ['data' => $news])
		@endslot --}}

	@endcomponent
</div>
@endsection
