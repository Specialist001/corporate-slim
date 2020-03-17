<?php


namespace App\Domain\ServiceCategories\Jobs;


use App\Domain\ServiceCategories\Models\ServiceCategory;
use App\Domain\ServiceCategories\Models\ServiceCategoryTranslation;
use App\Domain\ServiceCategories\Requests\ServiceCategoryRequest;
use App\Services\TranslitService;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreServiceCategoryJob
{
    use Queueable, Dispatchable;
    /**
     * @var ServiceCategoryRequest
     */
    protected $request;

    /**
     * StoreServiceCategoryJob constructor.
     * @param ServiceCategoryRequest $request
     */
    public function __construct(ServiceCategoryRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return ServiceCategory
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $serviceCategory = new ServiceCategory();
            $serviceCategory->parent_id = $this->request->input('parent_id', 0);
            $serviceCategory->slug = null;
            $serviceCategory->type = $this->request->input('type', null);
            $serviceCategory->active = $this->request->input('active', 1);
            $serviceCategory->order = $this->request->input('order', 0);
            $serviceCategory->image = null;
            $serviceCategory->icon = null;
            $serviceCategory->save();

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
                $serviceCategory->image = $serviceCategory->uploadImage($this->request->file('image'));
            } else {
                $serviceCategory->image = null;
            }
            if ($this->request->hasFile('icon')) {
                $serviceCategory->icon = $serviceCategory->uploadIcon($this->request->file('icon'));
            } else {
                $serviceCategory->icon = null;
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
