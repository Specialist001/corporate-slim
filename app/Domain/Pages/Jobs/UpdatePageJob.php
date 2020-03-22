<?php

namespace App\Domain\Pages\Jobs;

use App\Domain\Pages\Models\Page;
use App\Domain\Pages\Models\PageTranslation;
use App\Domain\Pages\Requests\PageRequest;
use App\Services\TranslitService;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdatePageJob
{
    use Queueable, Dispatchable;

    /**
     * @var PageRequest
     */
    protected $request;

    /**
     * @var Page
     */
    protected $page;

    /**
     * UpdatePageJob constructor.
     * @param PageRequest $request
     * @param Page $page
     */
    public function __construct(PageRequest $request, Page $page)
    {
        $this->request = $request;
        $this->page = $page;
    }

    /**
     * @return Page
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $page = $this->page;
            $page->page_category_id = $this->request->input('page_category_id', 0);
            $page->type = $this->request->input('type', null);
            $page->active = $this->request->input('active', 1);
            $page->order = $this->request->input('order', 0);
            $page->top = $this->request->input('top', 0);
            $page->system = $this->request->input('system', 0);
            $page->save();

            $page->translations()->delete();
            $translations = [];
            foreach ($this->request->input('translations', []) as $translate) {
                if ($translate['title'] == '')   continue;
                if ($translate['full'] == '')   continue;

                if (!isset($translate['short']) || $translate['short'] == '') {
                    $temp = strip_tags($translate['full']);
                    if(mb_strlen($temp) > 500) {
                        $translate['short'] = mb_substr($temp, 0, 500);
                    } else {
                        $translate['short'] = $temp;
                    }
                    $translate['short'] = str_replace('&nbsp;', '', $translate['short']);
                }
                $translations[] = new PageTranslation($translate);
            }
            if(!empty($translations)) {
                $page->translations()->saveMany($translations);
                $page->slug = strtolower(TranslitService::makeLatin($page->title));
                $page->save();
            }
            if ($this->request->hasFile('image')) {
                $page->deleteImage();
                $page->image = $page->uploadImage($this->request->file('image'));
            } else {
                $page->image = null;
            }
            $page->save();

        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();

        return $page;
    }
}
