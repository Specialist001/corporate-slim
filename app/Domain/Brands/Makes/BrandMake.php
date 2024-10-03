<?php

namespace App\Domain\Brands\Makes;

use AllowDynamicProperties;
use App\Domain\Brands\Requests\BrandRequest;

#[AllowDynamicProperties] class BrandMake
{
    public function __construct(BrandRequest $brandRequest)
    {
        $this->name = $brandRequest->input('name');
        $this->order = $brandRequest->input('order', 0);
        $this->active = $brandRequest->input('active');
        $this->on_main = $brandRequest->input('on_main', 0);
        $this->logo = $brandRequest->hasFile('logo') ? $brandRequest->file('logo') : null;
        $this->delete_old_logo = $brandRequest->hasFile('logo');
    }
}
