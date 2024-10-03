<?php

namespace App\Livewire\Schedules\Forms;

use App\Models\Task;

class EditSchedule extends BaseSchedule 
{    
    public $taskGroup;

    public function mount($task, $mode)
    {
        parent::mount($task, $mode);
    }

    public function getTaskGroup($taskGroup)
    {
        $this->taskGroup = $taskGroup;
    }
}   