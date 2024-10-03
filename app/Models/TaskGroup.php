<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskGroup extends Model
{
    protected $fillable = ['task_id', 'week', 'weekStart', 'weekEnd'];
    use HasFactory;
    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }

    public function taskDetails()
    {
        return $this->hasMany(TaskDetail::class);
    }
}
