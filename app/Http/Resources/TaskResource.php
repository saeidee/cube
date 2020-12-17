<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class TaskResource
 * @property int id
 * @property string title
 * @property string description
 * @property Carbon due_at
 * @property Carbon completed_at
 * @package App\Http\Resources
 */
class TaskResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'due_at' => $this->due_at ? $this->due_at->toDateTimeString() : null,
            'completed_at' => $this->completed_at ? $this->completed_at->toDateTimeString() : null,
        ];
    }
}
