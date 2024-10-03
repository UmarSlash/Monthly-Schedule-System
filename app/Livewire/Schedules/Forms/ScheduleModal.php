<?php

namespace App\Livewire\Schedules\Forms;

use App\Livewire\Schedules\Tables\ListSchedule;
use App\Models\Task;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class ScheduleModal extends Component
{
    public $selectedMonth;
    public $selectedYear;
    public bool $showModal = false;
    public $months = [];
    public $excludedMonths = [];
    public $availableMonths = [];

    public function mount()
    {
        $this->selectedYear = now()->year;
        $this->months = $this->getMonthNames();
        $this->updateAvailableMonths();
    }

    protected $rules = [
        'selectedMonth' => 'required|integer|min:1|max:12',
        'selectedYear' => 'required|integer|min:2000|max:2050',
    ];

    #[On('show')]
    public function show()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function submit()
    {
        $this->validate([
            'selectedYear' => 'required|integer|min:2000|max:2050',
            'selectedMonth' => 'required|integer|min:1|max:12',
        ]);

        // dd($this->selectedMonth, $this->selectedYear);

        $task = new Task();
        $task->month = $this->selectedMonth;
        $task->year = $this->selectedYear; // Assuming you want to store the current year
        $task->save();

        $this->updateAvailableMonths(); // Update the available months to reflect the new data
        $this->closeModal(); // Close the modal after submission
        $this->dispatch('refreshComponent')->to(ListSchedule::class);

        return redirect()->route('schedule.test', ['task' => $task->id]);
    }

    public function getMonthNames()
    {
        $months = [];
        foreach (range(1, 12) as $month) {
            $months[$month] = Carbon::createFromDate(null, $month, 1)->format('F');
        }
        return $months;
    }

    public function getExcludedMonths($year)
    {
        return Task::where('year', $year)->pluck('month')->toArray();
    }

    public function updateAvailableMonths()
    {
        $this->excludedMonths = $this->getExcludedMonths($this->selectedYear);
        $this->availableMonths = array_diff_key($this->months, array_flip($this->excludedMonths));
    }


    public function render()
    {
        return view('livewire.schedules.forms.schedule-modal');
    }
}
