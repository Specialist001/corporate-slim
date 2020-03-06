<?php

namespace App\Domain\News\Jobs;


use App\Domain\News\Models\News;
use App\Domain\News\Models\NewsTranslation;
use App\Domain\News\Requests\NewsRequest;
use App\Services\TranslitService;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreNewsJob
{
    use Queueable, Dispatchable;

    /**
     * @var NewsRequest
     */
    protected $request;

    /**
     * StoreNewsJob constructor.
     * @param NewsRequest $request
     */
    public function __construct(NewsRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return News
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $news = new News();
            $news->type = $this->request->input('type', News::TYPE_NEWS);
            $news->slug = null;
            $news->image = null;
            $news->thumb = null;
            $news->order = $this->request->input('order', 0);
            $news->active = $this->request->input('active', 1);
            $news->save();

            $translations = [];
            foreach ($this->request->input('translations', []) as $translate) {
                if ($translate['title'] == '') {
                    continue;
                }
                if ($translate['full'] == '') {
                    continue;
                }
                if (!isset($translate['short']) || $translate['short'] == '') {
                    $temp = strip_tags($translate['full']);
                    if(mb_strlen($temp) > 500) {
                        $translate['short'] = mb_substr($temp, 0, 500);
                    } else {
                        $translate['short'] = $temp;
                    }
                    $translate['short'] = str_replace('&nbsp;', '', $translate['short']);
                }
                $translations[] = new NewsTranslation($translate);
            }
            if (!empty($translations)) {
                $news->translations()->saveMany($translations);
                $news->slug = TranslitService::makeLatin($news->title);
                $news->save();
            }
            if ($this->request->hasFile('image')) {
                $news->image = $news->uploadImage($this->request->file('image'));
                $news->thumb = 'th_'.$news->image;
            } else {
                $news->image = null;
                $news->thumb = null;
            }
            $news->save();

        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();

        return $news;
    }
}
