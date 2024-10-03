<?php

namespace App\Livewire\Schedules\Forms;

use App\Traits\MonthTrait;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Task;
use App\Models\TaskGroup;
use Livewire\Attributes\On;

class ScheduleButton extends Component
{
    use MonthTrait;

    public ?Task $task = null;

    public ?int $selectedMonth = null;
    public ?int $currentYear = null;

    // #[On('refreshComponent')]
    // public function mount()
    // {
    //     $this->selectedMonth ??= $this->getMonth();
    //     $this->currentYear ??= $this->getYear();
    //     $date = Carbon::createFromFormat('m/Y', "{$this->selectedMonth}/{$this->currentYear}");
    //     $this->setMonthAndYear($date);
    // }

    public function mount()
    {
        $this->task ??= new Task();
        $this->selectedMonth = $this->task?->month ?? $this->getMonth();
        $this->currentYear = $this->task?->year ?? $this->getYear();
    }
    

    public function selectMonth()
    {
        $this->validate([
            'selectedMonth' => 'required|integer|min:1|max:12',
        ]);

        $date = Carbon::createFromFormat('m/Y', "{$this->selectedMonth}/{$this->currentYear}");
        $this->setMonthAndYear($date);
    }

    public function nextMonth()
    {
        $date = Carbon::createFromFormat('m/Y', "{$this->selectedMonth}/{$this->currentYear}")->addMonth();
        $this->setMonthAndYear($date);
    }

    public function previousMonth()
    {
        $date = Carbon::createFromFormat('m/Y', "{$this->selectedMonth}/{$this->currentYear}")->subMonth();
        $this->setMonthAndYear($date);
    }

    public function setMonthAndYear(Carbon $date)
    {
        $this->selectedMonth = $date->month;
        $this->currentYear = $date->year;

        $existingTask = Task::where('month', $this->selectedMonth)
            ->where('year', $this->currentYear)
            ->first();

        if (!$existingTask) {
            $task = new Task();
            $task->month = $this->selectedMonth;
            $task->year = $this->currentYear;
            $task->save();
        }

    }

    protected function getMonthOptions(): array
    {
        return collect(range(1, 12))->mapWithKeys(function ($item) {
            return [$item => Carbon::createFromFormat('m', $item)->monthName];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.schedules.forms.schedule-button', [
            'monthOptions' => $this->getMonthOptions()
        ]);
    }
}
