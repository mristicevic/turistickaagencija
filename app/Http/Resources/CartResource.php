<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'cart';
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            
            'id'=>$this->resource->id,
            'name'=>$this->resource->name,
            'product_title'=>$this->resource->product_title,
            'quantity'=>$this->resource->quantity,
            'price' =>$this->resource-> price
        ];
    }
}