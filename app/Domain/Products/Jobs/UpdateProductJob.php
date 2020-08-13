<?php

namespace App\Domain\Products\Jobs;

use App\Domain\Products\Models\Product;
use App\Domain\Products\Models\ProductTranslation;
use App\Domain\Products\Requests\ProductRequest;
use App\Services\TranslitService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateProductJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    private $request;
    private $product;

    /**
     * Create a new job instance.
     *
     * @param ProductRequest $request
     * @param Product $product
     */
    public function __construct(ProductRequest $request, Product $product)
    {
        $this->request = $request;
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return Product
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $product = $this->product;
            $product->product_category_id = $this->request->input('product_category_id');
            $product->brand_id = $this->request->input('brand_id',null);
            $product->unit_id = $this->request->input('unit_id',null);
            $product->amount = $this->request->input('amount',1);
            $product->old_price = $this->request->input('old_price',0);
            $product->price = $this->request->input('price');
            $product->warranty = $this->request->input('warranty', 0);
            $product->sku = $this->request->input('sku', null);
            $product->manufacturer = $this->request->input('manufacturer', null);
            $product->active = $this->request->input('active', Product::STATUS_ACTIVE);
            $product->on_main = $this->request->input('on_main', 0);
            $product->wholesale = $this->request->input('wholesale', '');
            $product->save();

            $product->translations()->delete();
            $translations = [];
            foreach ($this->request->input('translations', []) as $translate) {
                if ($translate['title'] == '') {
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
                $translations[] = new ProductTranslation($translate);
            }
            if (!empty($translations)) {
                $product->translations()->saveMany($translations);
                $product->slug = TranslitService::makeLatin($product->title);
                $product->save();
            }

        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();

        return $product;
    }
}
