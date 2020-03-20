<?php

namespace App\Domain\Services\Jobs;


use App\Domain\Services\Models\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class DeleteServiceJob
{
    use Queueable, Dispatchable;

    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * @return Service
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $this->service->translations()->delete();
            $this->service->deleteImage();
            $this->service->deleteIcon();
            $this->service->delete();
        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();
    }
}
