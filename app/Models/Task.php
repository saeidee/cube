<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Task
 * @package App\Models
 * @property int id
 * @property string title
 * @property string description
 * @property Carbon due_at
 * @property Carbon completed_at
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Task extends Model
{
    use SoftDeletes;

    /** @var array */
    protected $fillable = ['title', 'description', 'due_at', 'completed_at'];

    /** @var array */
    protected $dates = ['due_at', 'completed_at', 'deleted_at'];

    /**
     * @return bool
     */
    public function markAsComplete(): bool
    {
        $this->completed_at = now();

        return $this->save();
    }

    /**
     * @return bool
     */
    public function markAsIncomplete(): bool
    {
        $this->completed_at = null;

        return $this->save();
    }
}
