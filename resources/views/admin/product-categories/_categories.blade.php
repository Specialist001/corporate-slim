@foreach($categories as $category_list)
    <option value="{!!  $category_list->id !!}"
    @isset($productCategory->id)
        @if($productCategory->parent_id == $category_list->id)
            selected=""
        @endif
        @if($productCategory->id == $category_list->id)
            hidden=""
        @endif
    @endisset
    >
    {!! $delimiter !!} {{ $category_list->title }}
    </option>

    @if(count($category_list->children) > 0)
        @include('admin.product-categories._categories',[
        	'categories' => $category_list->children,
        	'delimiter' => '-'.$delimiter
    	])
    @endif
@endforeach
