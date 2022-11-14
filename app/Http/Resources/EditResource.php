<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EditResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name'=>$this->name,
            'age'=>$this->age,
            'country'=>$this->country,
            'private_image'=>$this->private_image,
            'private_videos' =>$this->private_videos,
            'image_url'=>$this->image_url,
            // dd($this->created_at),
            'created_at'=>date('d m Y', strtotime($this->created_at)),
            // 'updated_at' =>date('d M Y', strtotime($this->created_at)),
        ];
    }
}
