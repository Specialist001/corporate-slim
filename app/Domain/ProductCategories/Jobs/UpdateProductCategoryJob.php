<?php

namespace App\Domain\ProductCategories\Jobs;

use App\Domain\ProductCategories\Models\ProductCategory;
use App\Domain\ProductCategories\Requests\ProductCategoryRequest;
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
        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();

        return $productCategory;
    }
}
