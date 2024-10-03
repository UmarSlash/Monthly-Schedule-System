<?php

namespace App\Livewire\Schedules\Forms;

use App\Traits\MonthTrait;
use Livewire\Component;
use App\Models\Work;
use App\Models\Staff;
use App\Models\Task;
use App\Models\TaskGroup;
use Carbon\Carbon;
use Livewire\Attributes\On;

abstract class BaseSchedule extends Component
{
    use MonthTrait;

    public ?Task $task = null;

    public ?int $selectedMonth = null;
    public ?int $currentYear = null;
    public $mode;

    public function mount($task, $mode)
    {
        $this->mode = $mode;

        // dd($mode);
        $this->task = $task;
        $this->selectedMonth = $this->task?->month ?? $this->getMonth();
        $this->currentYear = $this->task?->year ?? $this->getYear();
    }

    public function getStaff()
    {
        return Staff::all();
    }

    public function getLowerWorks()
    {
        return Work::where('office', 'lower')->get();
    }

    public function getUpperWorks()
    {
        return Work::where('office', 'upper')->get();
    }

    #[On('getWeek')]
    public function getWeek($month, $year)
    {
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



    public function render()
    {
        return view('livewire.schedules.forms.base-schedule', [
            'lowerWorks'    => $this->getLowerWorks(),
            'upperWorks'    => $this->getUpperWorks(),
            'staffs'        => $this->getStaff(),
        ]);
    }
}
