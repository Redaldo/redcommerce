<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductIndexResource extends JsonResource
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
            'description' => $this->description,
            'images' => $this->whenLoaded('images', function () {
                return $this->images->map(function ($image) {
                    return asset('storage/' . $image->path);
                });
            }),
        ];
    }
}
