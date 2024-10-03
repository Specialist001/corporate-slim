<?php

namespace App\Domain\Brands\Jobs;

use App\Domain\Brands\Makes\BrandMake;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Domain\Brands\Models\Brand;

class BrandJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param BrandMake $brandMake
     * @param Brand|null $brand
     */
    public function __construct(
        protected BrandMake $brandMake,
        protected Brand|null $brand = null
    )
    {
    }

    /**
     * Execute the job.
     * @return Model|Brand|false
     * @throws \Exception
     */
    public function handle(): \Illuminate\Database\Eloquent\Model | Brand | false
    {
        \DB::beginTransaction();
        try {
            $brand = $this->brand ?? new Brand();
            $brand->name = $this->brandMake->name;
            $brand->order = $this->brandMake->order;
            $brand->active = $this->brandMake->active;
            $brand->on_main = $this->brandMake->on_main;
            $brand->save();

            if ($this->brandMake->delete_old_logo) {
                $brand->deleteLogo();
                $brand->logo = $brand->uploadLogo($this->brandMake->logo);
            } else {
                $brand->logo = $brand->logo ?? null;
            }
            $brand->save();

        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();

        return $brand;
    }
}
