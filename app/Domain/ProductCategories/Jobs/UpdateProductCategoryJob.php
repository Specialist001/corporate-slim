<?php

namespace App\Domain\ProductCategories\Jobs;

use App\Domain\ProductCategories\Models\ProductCategory;
use App\Domain\ProductCategories\Models\ProductCategoryTranslation;
use App\Domain\ProductCategories\Requests\ProductCategoryRequest;
use App\Services\TranslitService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateProductCategoryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $request;
    private $productCategory;

    /**
     * Create a new job instance.
     *
     * @param ProductCategoryRequest $request
     * @param ProductCategory $productCategory
     */
    public function __construct(ProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $this->request = $request;
        $this->productCategory = $productCategory;
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
            $productCategory = $this->productCategory;
            $productCategory->parent_id = $this->request->input('parent_id', null);
            $productCategory->active = $this->request->input('active', 1);
            $productCategory->on_main = $this->request->input('on_main', 0);
            $productCategory->order = $this->request->input('order', 0);
            $productCategory->save();

            $productCategory->translations()->delete();
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
                $productCategory->deleteImage();
                $productCategory->image = $productCategory->uploadImage($this->request->file('image'));
            }
            if ($this->request->hasFile('icon')) {
                $productCategory->deleteIcon();
                $productCategory->icon = $productCategory->uploadIcon($this->request->file('icon'));
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
