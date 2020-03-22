<?php

namespace App\Domain\PageCategories\Jobs;


use App\Domain\PageCategories\Models\PageCategory;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class DeletePageCategoryJob
{
    use Queueable, Dispatchable;

    protected $pageCategory;

    /**
     * DeletePageCategoryJob constructor.
     * @param PageCategory $pageCategory
     */
    public function __construct(PageCategory $pageCategory)
    {
        $this->pageCategory = $pageCategory;
    }

    /**
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $this->pageCategory->translations()->delete();
            $this->pageCategory->delete();
        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();
    }
}
