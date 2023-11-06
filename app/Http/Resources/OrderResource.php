<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "coin"=> $this->coin,
            "type"=> $this->type,
            "amount"=> $this->amount,
            "price"=> $this->price,
            "created_at"=> $this->created_at,
            "updated_at"=> $this->updated_at,
            "user"=> new UserResource($this->whenLoaded("user")),
        ];
    }
}
