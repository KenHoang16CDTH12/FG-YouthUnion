<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class HoatDongResource extends Resource
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
            'from_date' => $this->from_date,
            'end_date' => $this->end_date,
            'hoc_ky' => $this->hocky,
            'hoatdong_type' => $this->hoatdongtype,
            'updated_at' => $this->updated_at,
        ];
    }
}
