<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class KhoaResource extends Resource
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
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desc,
            'lcdoan' => $this->lcdoan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
