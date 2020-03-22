@foreach($categories as $category_list)
    <option value="{!!  $category_list->id !!}"
    @isset($serviceCategory->id)
        @if($serviceCategory->parent_id == $category_list->id)
            selected=""
        @endif
        @if($serviceCategory->id == $category_list->id)
            hidden=""
        @endif
    @endisset
    >
    {!! $delimiter !!} {{ $category_list->title }}
    </option>

    @if(count($category_list->children) > 0)
        @include('admin.service-categories._categories',[
        	'categories' => $category_list->children,
        	'delimiter' => '-'.$delimiter
    	])
    @endif
@endforeach
