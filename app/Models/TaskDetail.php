<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDetail extends Model
{
    protected $fillable = ['task_group_id', 'work_id', 'staff_id'];
    use HasFactory;
    
    public function taskGroup()
    {
        return $this->belongsTo(TaskGroup::class);
    }
    public function work()
    {
        return $this->belongsTo(Work::class);
    }
    
    public function staff()
    {
        return $this->belongsTo(Staff::class)->withTrashed();
    }
}
