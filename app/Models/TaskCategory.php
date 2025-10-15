<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TaskCategory extends Model
{
    public $fillable = ['name'];

    // protected $table = 'task_categories';

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class);
    }

}
