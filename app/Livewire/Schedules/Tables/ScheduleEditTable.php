<?php

namespace App\Livewire\Schedules\Tables;

use Livewire\Component;
use App\Models\Staff;
use App\Models\Work;
use App\Models\TaskGroup;
use Illuminate\Http\Request;

class ScheduleEditTable extends Component
{
    public $month;

    public function mount(Request $request)
    {
        // Get the month from the query parameter or default to current month
        $this->month = $request->query('month', date('n'));
    }
    
    public function render()
    {
        $staffs = Staff::all();
        $upperWorks = Work::where('office', 'upper')->get();
        $lowerWorks = Work::where('office', 'lower')->get();
        $taskGroup = TaskGroup::with([
            'taskDetails.work'
        ])->where('task_id', $this->month)->get(); // Assuming Work is the model for the works table
        
        return view('livewire.schedules.tables.schedule-edit-table', [
            'month' => $this->month,
            'staffs' => $staffs,
            'upperWorks' => $upperWorks, 
            'lowerWorks' => $lowerWorks,
            'taskGroup' => $taskGroup,
        ]);
    }
}
