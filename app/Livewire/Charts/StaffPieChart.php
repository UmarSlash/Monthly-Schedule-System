<?php

namespace App\Livewire\Charts;

use App\Models\Staff;
use Livewire\Component;

class StaffPieChart extends Component
{
    public function render()
    {
        $totalStaff = Staff::count();
        $maleStaff = Staff::where('gender', 'male')->count();
        $femaleStaff = Staff::where('gender', 'female')->count();

        // Pass data to the view
        return view('livewire.charts.staff-pie-chart', [
            'totalStaff' => $totalStaff,
            'maleStaff' => $maleStaff,
            'femaleStaff' => $femaleStaff,
        ]);    
    }
}
