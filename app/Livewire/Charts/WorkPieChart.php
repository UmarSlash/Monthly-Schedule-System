<?php

namespace App\Livewire\Charts;

use App\Models\Work;
use Livewire\Component;

class WorkPieChart extends Component
{
    public function render()
    {
        $totalWork = Work::count();
        $upperWork = Work::where('office', 'upper')->count();
        $lowerWork = Work::where('office', 'lower')->count();

        // Pass data to the view
        return view('livewire.charts.work-pie-chart', [
            'totalWork' => $totalWork,
            'upperWork' => $upperWork,
            'lowerWork' => $lowerWork,
        ]);    
    }
}
