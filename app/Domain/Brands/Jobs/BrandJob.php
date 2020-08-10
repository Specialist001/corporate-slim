<?php

namespace App\Domain\Brands\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Domain\Brands\Models\Brand;
use App\Domain\Brands\Requests\BrandRequest;

class BrandJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var BrandRequest
     */
    protected $request;

    /**
     * @var Brand
     */
    protected $brand;

    /**
     * Create a new job instance.
     *
     * @param BrandRequest $request
     * @param Brand|null $brand
     */
    public function __construct(BrandRequest $request, Brand $brand = null)
    {
        $this->request = $request;
        $this->brand = $brand;
    }

    /**
     * Execute the job.
     * @return false|\Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $brand = $this->brand ?? new Brand();
            $brand->name = $this->request->input('name');
            $brand->order = $this->request->input('order', 0);
            $brand->active = $this->request->input('active');
            $brand->on_main = $this->request->input('on_main', 0);
            $brand->save();

            if ($this->request->hasFile('logo')) {
                $brand->deleteLogo();
                $brand->logo = $brand->uploadLogo($this->request->file('logo'));
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
