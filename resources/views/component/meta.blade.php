@if($metaTags)
@foreach($metaTags as $metaTag)
    <meta name="{{$metaTag['name']}}" content="{{$metaTag['content']}}">
@endforeach
@endif

@if($ogTags)
@foreach($ogTags as $ogTag)
    <meta property="{{$ogTag['property']}}" content="{{$ogTag['content']}}">
@endforeach
@endif