<?php

namespace App\Domain\ServiceCategories\Jobs;


use App\Domain\ServiceCategories\Models\ServiceCategory;
use App\Domain\ServiceCategories\Models\ServiceCategoryTranslation;
use App\Domain\ServiceCategories\Requests\ServiceCategoryRequest;
use App\Services\TranslitService;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class DeleteServiceCategoryJob
{
    use Queueable, Dispatchable;

    public $serviceCategory;

    public function __construct(ServiceCategory $serviceCategory)
    {
        $this->serviceCategory = $serviceCategory;
    }

    /**
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $this->serviceCategory->translations()->delete();
            $this->serviceCategory->deleteImage();
            $this->serviceCategory->deleteIcon();
            $this->serviceCategory->delete();
        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();
    }
}
