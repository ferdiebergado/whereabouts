<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WhereaboutResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'activity' => $this->activity,
            'venue' => $this->venue,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'sponsor' => $this->sponsor,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
