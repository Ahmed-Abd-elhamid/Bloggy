<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;


class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id' => $this->user ? $this->user->name : "Not exist",
          'posted_by' => $this->user_id,
          'title' => $this->title,
          'description' => $this->description,
          'category' => $this->category,
          'user-info' => new UserResource($this->user),
        ];
    }
}
