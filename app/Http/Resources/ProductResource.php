<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->detail,
            'image' => ($this->image && Storage::exists($this->image)) ? Storage::url($this->image) : asset('img/no-image.png'),
            'price' => $this->price,
            'stock' => $this->stock > 0 ? ($this->stock) : "Out of stock",
            'discount' => $this->discount,
            'discountPrice' => round(((1-($this->discount/100))*$this->price),2),
            'rating' => $this->reviews->count() > 0 ? (round($this->reviews->sum('star')/$this->reviews->count(),2)) : "No rating yet",
            'href' => [
                'reviews' => route('reviews.index', $this->id)
            ]
        ];
    }
}
