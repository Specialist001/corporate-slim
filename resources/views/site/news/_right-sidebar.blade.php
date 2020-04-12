<div class="blog_right_sidebar">
    @include('site.news._right-sidebar-search')

    @include('site.news._right-sidebar-recent_posts', ['lastNews' => $lastNews])
</div>
