<?php

namespace App\Livewire\Schedules\Tables;

use App\Livewire\Schedules\Forms\ScheduleModal;
use Livewire\Component;
use App\Models\Task;
use Livewire\Attributes\On;

class ListSchedule extends Component
{
    public $tasks;
    public $selectedYear;

    #[On('refreshComponent')]
    public function mount()
    {
        $this->tasks = $this->getTask();
    }

    public function updatedSelectedYear()
    {
        $this->validate([
            'selectedYear' => 'required|integer|min:2000|max:2050',
        ]);
        
        $this->tasks = $this->getTask();
    }

    protected function getTask()
    {
        return Task::when($this->selectedYear, fn ($q) => $q->where('year', $this->selectedYear))->get();
    }

    public function cancel()
    {
        return redirect()->route('schedule.list');
    }

    public function add()
    {
        $this->dispatch('show')->to(ScheduleModal::class);
    }

    public function refresh()
    {
        $this->selectedYear = null;
        $this->dispatch('refreshComponent')->self();
    }

    public function render()
    {
        return view('livewire.schedules.tables.list-schedule');
    }
}
