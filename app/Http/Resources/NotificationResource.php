<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'employer_id' => $this->employer_id,
            'url' => $this->url,
            'category_id' => $this->category_id,
            'is_by_jobnet' => $this->is_by_jobnet,
            'job_date' => $this->job_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
