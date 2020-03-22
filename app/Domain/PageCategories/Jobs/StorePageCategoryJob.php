<?php

namespace App\Domain\PageCategories\Jobs;


use App\Domain\PageCategories\Models\PageCategory;
use App\Domain\PageCategories\Models\PageCategoryTranslation;
use App\Domain\PageCategories\Requests\PageCategoryRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class StorePageCategoryJob
{
    use Queueable, Dispatchable;

    protected $request;

    /**
     * StorePageCategoryJob constructor.
     * @param PageCategoryRequest $request
     */
    public function __construct(PageCategoryRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $pageCategory = new PageCategory();
            $pageCategory->active = $this->request->input('active',1);
            $pageCategory->order = $this->request->input('order',0);
            $pageCategory->top = $this->request->input('top',0);
            $pageCategory->bottom = $this->request->input('bottom',0);
            $pageCategory->save();

            $translations = [];

            foreach ($this->request->input('translations', []) as $translate) {
                if ($translate['name'] == '') {
                    continue;
                }
                $translations = new PageCategoryTranslation($translate);
            }
            if(!empty($translations)) {
                $pageCategory->translations()->save($translations);

            }
            $pageCategory->save();

        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();

        return $pageCategory;
    }
}
