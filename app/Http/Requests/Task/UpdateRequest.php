<?php

namespace App\Http\Requests\Task;

use App\Http\Requests\Request;

/**
 * Class UpdateRequest
 * @package App\Http\Requests\Task
 */
class UpdateRequest extends Request
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'description' => 'max:1000',
            'due_at' => 'date_format:Y-m-d H:i:s',
        ];
    }
}
