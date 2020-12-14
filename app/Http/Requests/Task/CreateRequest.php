<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class TaskCreateRequest
 * @package App\Http\Requests\Task
 */
class TaskCreateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
