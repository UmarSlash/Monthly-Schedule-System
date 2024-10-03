<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Task extends Model
{
    protected $fillable = ['month', 'year']; // Fillable attributes of the Task model
    use HasFactory;

    public function taskGroups()
    {
        return $this->hasMany(TaskGroup::class);
    }

    public function details(): HasManyThrough
    {
        return $this->hasManyThrough(TaskDetail::class, TaskGroup::class);
    }
}
