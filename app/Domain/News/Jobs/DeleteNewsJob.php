<?php

namespace App\Domain\News\Jobs;


use App\Domain\News\Models\News;
use App\Domain\News\Models\NewsTranslation;
use App\Domain\News\Requests\NewsRequest;
use App\Services\TranslitService;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class DeleteNewsJob
{
    use Queueable, Dispatchable;

    /**
     * @var News
     */
    protected $news;

    /**
     * DeleteNewsJob constructor.
     * @param News $news
     */
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    /**
     * Execute the job.
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $this->news->translations()->delete();
            $this->news->deleteImage();
            $this->news->delete();
        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();
    }
}
