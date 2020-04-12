<aside class="single_sidebar_widget popular_post_widget">
    <h3 class="widget_title">@lang('common.titles.last_news')</h3>
    @foreach($lastNews as $item)
        <div class="media post_item">
            <div class="post_item__img">
                <img src="{{ $item->thumbUrl() }}" alt="{{ $item->slug }}" class="img-fluid">
            </div>
            <div class="media-body">
                <a href="{{ route('site.news.show', $item->slug) }}">
                    <h3>{{ $item->title }}</h3>
                </a>
                <p>{{ $item->created_at->format('d.m.Y') }}</p>
            </div>
        </div>
    @endforeach
</aside>
