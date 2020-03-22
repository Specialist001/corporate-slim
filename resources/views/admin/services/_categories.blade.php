@foreach($categories as $category)
    <option value="{!!  $category->id !!}"
    @if(isset($service))
            @if($category->id == $service->service_category_id)
                selected
            @endif
    @endif
    >
    {!! $delimiter !!} {{ $category->title }}
    </option>

    @if(count($category->children) > 0)
        @include('admin.services._categories',[
        	'categories' => $category->children,
        	'delimiter' => '&bull;'.$delimiter,
    	])
    @endif
@endforeach
