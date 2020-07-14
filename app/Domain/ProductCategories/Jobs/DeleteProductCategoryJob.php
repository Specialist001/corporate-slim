<?php

namespace App\Domain\ProductCategories\Jobs;

use App\Domain\ProductCategories\Models\ProductCategory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DeleteProductCategoryJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    private $productCategory;

    /**
     * Create a new job instance.
     *
     * @param ProductCategory $productCategory
     */
    public function __construct(ProductCategory $productCategory)
    {
        $this->productCategory = $productCategory;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $this->productCategory->translations()->delete();
            $this->productCategory->deleteImage();
            $this->productCategory->deleteIcon();
            $this->productCategory->delete();
        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();
    }
}
