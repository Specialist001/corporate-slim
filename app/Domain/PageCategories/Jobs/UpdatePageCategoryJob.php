<?php


namespace App\Domain\PageCategories\Jobs;


use App\Domain\PageCategories\Models\PageCategory;
use App\Domain\PageCategories\Models\PageCategoryTranslation;
use App\Domain\PageCategories\Requests\PageCategoryRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdatePageCategoryJob
{
    use Queueable, Dispatchable;

    protected $request;
    protected $pageCategory;

    /**
     * UpdatePageCategoryJob constructor.
     * @param PageCategoryRequest $request
     * @param PageCategory $pageCategory
     */
    public function __construct(PageCategoryRequest $request, PageCategory $pageCategory)
    {
        $this->request = $request;
        $this->pageCategory = $pageCategory;
    }


    /**
     * @return PageCategory
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $pageCategory = $this->pageCategory;
            $pageCategory->active = $this->request->input('active',1);
            $pageCategory->order = $this->request->input('order',0);
            $pageCategory->top = $this->request->input('top',0);
            $pageCategory->bottom = $this->request->input('bottom',0);
            $pageCategory->save();

            $pageCategory->translations()->delete();
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
