<?php


namespace App\Domain\News\Resources;


use App\Domain\News\Models\News;
use Illuminate\Http\Resources\Json\Resource;

/**
 * Class CargoTypeResource
 * @package App\Domain\CargoTypes\Resources
 * @mixin CargoType
 */
class NewsResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'short' => $this->short,
            'full' => $this->full,
            'slug' => $this->slug,
            'image' => $this->image,
            'thumb' => $this->thumb,
            'views' => $this->views,
            'order' => $this->order,
            'active' => $this->active,
            'created_at' => $this->created_at,
            'meta_title' => $this->meta_title,
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description,
        ];
    }
}
