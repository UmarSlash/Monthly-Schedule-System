<?php

namespace App\Livewire\Schedules\Forms;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;

class ScheduleForm extends Component
{
    public $selectedMonth;

    public function mount()
    {
        // Get the selected month from session or default to current month
        $this->selectedMonth = Session::get('selectedMonth', date('n'));
    }

    public function storeMonth()
    {
        // Validate the selected month
        $this->validate([
            'selectedMonth' => 'required|integer|min:1|max:12',
        ]);

        // Store the selected month in session
        Session::put('selectedMonth', $this->selectedMonth);

        // Check if the month already exists in the Task tables
        $existingTask = Task::where('month', $this->selectedMonth)->where('year', date('Y'))->first();

        if ($existingTask) {
            // Month already exists, redirect to calculateWeeks route
            return redirect()->route('calculateWeeks', ['month' => $this->selectedMonth]);
        }

        // Month doesn't exist, insert a new record
        $task = new Task();
        $task->month = $this->selectedMonth;
        $task->year = date('Y'); // Assuming you want to store the current year
        $task->save();

        // Redirect to calculateWeeks route
        return redirect()->route('calculateWeeks', ['month' => $this->selectedMonth]);
    }

    public function nextMonth()
    {
        $selectedMonth = Session::get('selectedMonth', date('n'));
        $selectedMonth = ($selectedMonth % 12) + 1; // Increment month by 1
        Session::put('selectedMonth', $selectedMonth);

        return redirect()->route('schedule.index', ['month' => $selectedMonth]);
    }

    public function previousMonth()
    {
        $selectedMonth = Session::get('selectedMonth', date('n'));
        $selectedMonth = ($selectedMonth == 1) ? 12 : ($selectedMonth - 1); // Decrement month by 1
        Session::put('selectedMonth', $selectedMonth);

        return redirect()->route('schedule.index', ['month' => $selectedMonth]);
    }

    public function render()
    {
        return view('livewire.schedules.forms.schedule-form');
    }
}
