<?php


namespace App\Domain\Services\Jobs;


use App\Domain\Services\Models\Service;
use App\Domain\Services\Models\ServiceTranslation;
use App\Domain\Services\Requests\ServiceRequest;
use App\Services\TranslitService;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreServiceJob
{
    use Queueable, Dispatchable;
    /**
     * @var ServiceRequest
     */
    protected $request;

    /**
     * StoreServiceJob constructor.
     * @param ServiceRequest $request
     */
    public function __construct(ServiceRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return Service
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $service = new Service();
            $service->service_category_id = $this->request->input('service_category_id');
            $service->slug = null;
            $service->active = $this->request->input('active', 1);
            $service->order = $this->request->input('order', 0);
            $service->image = null;
            $service->icon = null;
            $service->save();

            $translations = [];
            foreach ($this->request->input('translations', []) as $translate) {
                if ($translate['title'] == '') {
                    continue;
                }
                if ($translate['description'] == '') {
                    continue;
                }
                if (!isset($translate['short']) || $translate['short'] == '') {
                    $temp = strip_tags($translate['description']);
                    if(mb_strlen($temp) > 500) {
                        $translate['short'] = mb_substr($temp, 0, 500);
                    } else {
                        $translate['short'] = $temp;
                    }
                    $translate['short'] = str_replace('&nbsp;', '', $translate['short']);
                }
                $translations[] = new ServiceTranslation($translate);
            }
            if (!empty($translations)) {
                $service->translations()->saveMany($translations);
                $service->slug = strtolower(TranslitService::makeLatin($service->title));
                $service->save();
            }
            if ($this->request->hasFile('image')) {
                $service->image = $service->uploadImage($this->request->file('image'));
            } else {
                $service->image = null;
            }
            if ($this->request->hasFile('icon')) {
                $service->icon = $service->uploadIcon($this->request->file('icon'));
            } else {
                $service->icon = null;
            }
            $service->save();

        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();

        return $service;
    }
}
