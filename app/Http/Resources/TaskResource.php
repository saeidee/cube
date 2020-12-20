<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class TaskResource
 * @package App\Http\Resources
 * @property int id
 * @property string title
 * @property string description
 * @property Carbon due_at
 * @property Carbon completed_at
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class TaskResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'due_at' => optional($this->due_at)->toDateTimeString(),
            'completed_at' => optional($this->completed_at)->toDateTimeString(),
            'created_at' => optional($this->created_at)->toDateTimeString(),
            'updated_at' => optional($this->updated_at)->toDateTimeString(),
        ];
    }
}
