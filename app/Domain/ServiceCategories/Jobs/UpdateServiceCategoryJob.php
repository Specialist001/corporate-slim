<?php


namespace App\Domain\ServiceCategories\Jobs;


use App\Domain\ServiceCategories\Models\ServiceCategory;
use App\Domain\ServiceCategories\Models\ServiceCategoryTranslation;
use App\Domain\ServiceCategories\Requests\ServiceCategoryRequest;
use App\Services\TranslitService;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateServiceCategoryJob
{
    use Queueable, Dispatchable;

    public $request;

    public $serviceCategory;

    public function __construct(ServiceCategoryRequest $request, ServiceCategory $serviceCategory)
    {
        $this->serviceCategory = $serviceCategory;
        $this->request = $request;
    }

    /**
     * @return ServiceCategory
     * @throws \Exception
     */
    public function handle()
    {
        try {
            $serviceCategory = $this->serviceCategory;
            $serviceCategory->parent_id = $this->request->input('parent_id', 0);
            $serviceCategory->type = $this->request->input('type', null);
            $serviceCategory->order = $this->request->input('order', 0);
            $serviceCategory->active = $this->request->input('active', 1);
            $serviceCategory->save();

            $serviceCategory->translations()->delete();
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
                $translations[] = new ServiceCategoryTranslation($translate);
            }
            if (!empty($translations)) {
                $serviceCategory->translations()->saveMany($translations);

                $serviceCategory->slug = TranslitService::makeLatin($serviceCategory->title);
                $serviceCategory->save();
            }
            if ($this->request->hasFile('image')) {
                $serviceCategory->deleteImage();
                $serviceCategory->image = $serviceCategory->uploadImage($this->request->file('image'));
            }
            if ($this->request->hasFile('icon')) {
                $serviceCategory->deleteIcon();
                $serviceCategory->icon = $serviceCategory->uploadIcon($this->request->file('icon'));
            }
            $serviceCategory->save();

        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();

        return $serviceCategory;
    }
}
