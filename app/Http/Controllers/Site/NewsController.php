<?php


namespace App\Http\Controllers\Site;


use App\Domain\News\Models\News;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::withTranslation()->actives()
            ->orderBy('created_at', 'desc');

        $lastNews = $news->limit(4)->get();
        $news = $news->paginate(6, '*', 'page');

        return view('site.news.index', [
            'news' => $news,
            'lastNews' => $lastNews,
        ]);
    }

    public function show($slug)
    {
        $news = News::whereSlug($slug)->firstOrFail();

        $previous = News::where('created_at', '<', $news->created_at)->orderBy('created_at', 'desc')->first();
        $next = News::where('created_at', '>', $news->created_at)->orderBy('created_at')->first();

        $lastNews = News::withTranslation()->actives()
            ->orderBy('created_at', 'desc')->limit(4)->get();

        $newsViewed = session('newsViewed', []);
        if(!in_array($news->id, $newsViewed)) {
            $news->increment('views');
            $newsViewed[] = $news->id;
            session()->put('newsViewed', $newsViewed);
        }

        return view('site.news.show', [
            'news' => $news,
            'previous' => $previous,
            'next' => $next,
            'lastNews' => $lastNews
        ]);
    }
}
