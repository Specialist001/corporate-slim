<?php

namespace App\Domain\ProductCategories\Jobs;

use App\Domain\ProductCategories\Models\ProductCategory;
use App\Domain\ProductCategories\Models\ProductCategoryTranslation;
use App\Domain\ProductCategories\Requests\ProductCategoryRequest;
use App\Services\TranslitService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreProductCategoryJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    private $request;
    /**
     * Create a new job instance.
     *
     * @param ProductCategoryRequest $request
     */
    public function __construct(ProductCategoryRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return ProductCategory
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $productCategory = new ProductCategory();
            $productCategory->parent_id = $this->request->input('parent_id', null);
            $productCategory->slug = null;
            $productCategory->active = $this->request->input('active', 1);
            $productCategory->on_main = $this->request->input('on_main', 0);
            $productCategory->order = $this->request->input('order', 0);
            $productCategory->image = null;
            $productCategory->icon = null;
            $productCategory->save();

            $translations = [];
            foreach ($this->request->input('translations', []) as $translate) {
                if ($translate['title'] == '') {
                    continue;
                }

                $translations[] = new ProductCategoryTranslation($translate);
            }
            if (!empty($translations)) {
                $productCategory->translations()->saveMany($translations);
                $productCategory->slug = strtolower(TranslitService::makeLatin($productCategory->title));
                $productCategory->save();
            }
            if ($this->request->hasFile('image')) {
                $productCategory->image = $productCategory->uploadImage($this->request->file('image'));
            } else {
                $productCategory->image = null;
            }
            if ($this->request->hasFile('icon')) {
                $productCategory->icon = $productCategory->uploadIcon($this->request->file('icon'));
            } else {
                $productCategory->icon = null;
            }
            $productCategory->save();
        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();

        return $productCategory;
    }
}
