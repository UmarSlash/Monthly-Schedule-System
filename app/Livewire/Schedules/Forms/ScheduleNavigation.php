<?php

namespace App\Livewire\Schedules\Forms;

use App\Traits\MonthTrait;
use Carbon\Carbon;
use Livewire\Component;

class ScheduleNavigation extends Component
{
    use MonthTrait;

    public ?int $selectedMonth = null;
    public ?int $currentYear = null;

    public function mount()
    {
        $this->selectedMonth ??= $this->getMonth();
        $this->currentYear ??= $this->getYear();
        // dd($this->currentYear);
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
    }

    public function render()
    {
        return view('livewire.schedules.forms.schedule-navigation');
    }
}
