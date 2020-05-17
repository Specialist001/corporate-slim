<?php

namespace App\Http\Controllers\Api;

use App\Domain\News\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\News\Requests\NewsRequest;
use App\Domain\News\Resources\NewsResource;
use App\Domain\News\Jobs\StoreNewsJob;
use App\Domain\News\Jobs\UpdateNewsJob;
use App\Domain\News\Jobs\DeleteNewsJob;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(1);
        $news = News::withTranslation()->get();
        // dd($news);
        // return $news;
        return NewsResource::collection($news);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        try {
            $this->dispatchNow(new StoreNewsJob($request));
            return response()->json(['error'=>false, 'message'=>'success']);
        } catch(\Exception $exception) {
            return response()->json(['error'=>true, 'message'=>$exception->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return News::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, News $news)
    {
        //dd($request->input(), $news);
        // dd($this->dispatchNow(new UpdateNewsJob($request, $news)));
        try {
            $this->dispatchNow(new UpdateNewsJob($request, $news));
            return response()->json(['error'=>false, 'message'=>'Updated']);
        } catch(\Exception $exception) {
            return response()->json(['error'=>true, 'message'=>$exception->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return '';
    }
}
