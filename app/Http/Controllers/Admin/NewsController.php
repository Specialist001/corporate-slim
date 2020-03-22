<?php

namespace App\Http\Controllers\Admin;

use App\Domain\News\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\News\Requests\NewsRequest;
use App\Domain\News\Filters\NewsFilter;
use App\Domain\News\Jobs\StoreNewsJob;
use App\Domain\News\Jobs\UpdateNewsJob;
use App\Domain\News\Jobs\DeleteNewsJob;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $filter = new NewsFilter($request);
        $news = News::withTranslation()->filter($filter)->paginateFilter();

        return view('admin.news.index',[
            'news' => $news,
            'filters' => $filter->filters(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NewsRequest $request)
    {
        try {
            $this->dispatchNow(new StoreNewsJob($request));
            return redirect()->route('admin.news.index')->with('success', trans('admin.flash.created'));
        } catch(\Exception $exception) {
            return redirect()->route('admin.news.index')->with('error', trans('admin.flash.not_created'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domain\News\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    // public function show(News $news)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domain\News\Models\News  $news
     * @return \Illuminate\View\View
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domain\News\Models\News  $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NewsRequest $request, News $news)
    {
        //dd($request->input(), $news);
        // dd($this->dispatchNow(new UpdateNewsJob($request, $news)));
        try {
            $this->dispatchNow(new UpdateNewsJob($request, $news));
            return redirect()->route('admin.news.index')->with('success', trans('admin.flash.edited'));
        } catch(\Exception $exception) {
            return redirect()->route('admin.news.index')->with('error', trans('admin.flash.not_edited'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain\News\Models\News  $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(News $news)
    {
        try {
            $this->dispatchNow(new DeleteNewsJob($news));
            return redirect()->route('admin.news.index')->with('success', trans('admin.flash.destroyed'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.news.index')->with('danger', trans('admin.flash.not_destroyed'));
        }
    }

    public function deleteImage(News $news)
    {
        try {
            $news->deleteImage();
            $news->save();
            return response()->json(['result' => 'success'], 200);
        } catch (\Exception $exception) {
            return response()->json(['result' => 'error'], 200);
        }
    }
}
