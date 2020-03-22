<?php


namespace App\Domain\Pages\Jobs;


use App\Domain\Pages\Models\Page;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class DeletePageJob
{
    use Queueable, Dispatchable;

    /**
     * @var Page
     */
    private $page;

    /**
     * DeletePageJob constructor.
     * @param Page $page
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $this->page->translations()->delete();
            $this->page->deleteImage();
            $this->page->delete();
        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();
    }
}
