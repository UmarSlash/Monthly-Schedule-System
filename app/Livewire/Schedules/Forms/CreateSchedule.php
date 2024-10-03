<?php

namespace App\Livewire\Schedules\Forms;

use App\Models\TaskGroup;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;

class CreateSchedule extends BaseSchedule 
{
    public Collection $taskGroup;

    public function mount($task, $mode)
    {
        parent::mount($task, $mode);
        $this->createTaskGroups();

        $this->taskGroup ??= collect();
        
        if ($this->taskGroup->empty()) {
            $this->taskGroup = TaskGroup::where('task_id', $task->id)->get();
        }
    }

    protected function createTaskGroups()
    {
        $year = $this->task->year;
        $month = $this->task->month;
        $date = Carbon::createFromDate($year, $month);
        $week = 1;

        for ($i = 1; $i <= $date->daysInMonth; $i++) {
            $startOfWeek = Carbon::createFromDate($year, $month, $i)->startOfWeek()->toDateString();
            $endOfWeek = Carbon::createFromDate($year, $month, $i)->endOfWeek()->toDateString();

            $weeks[] = [
                'week' => $week,
                'start_date' => $startOfWeek,
                'end_date' => $endOfWeek,
            ];

            $existingTaskGroup = TaskGroup::where('task_id', $this->task->id)
                ->where('weekStart', $startOfWeek)
                ->where('weekEnd', $endOfWeek)
                ->first();

            if (!$existingTaskGroup) {
                $taskGroup = new TaskGroup();
                $taskGroup->task_id = $this->task->id;
                $taskGroup->week = $week;
                $taskGroup->weekStart = $startOfWeek;
                $taskGroup->weekEnd = $endOfWeek;
                $taskGroup->save();
            }

            $i += 6;
            $week++;
        }
    }
}