<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use App\Models\Work;
use App\Models\Task;
use App\Models\TaskGroup;
use App\Models\TaskDetail; 

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = Task::all(); // Fetch all tasks from the database
        $taskGroup = TaskGroup::all(); // Fetch all task groups
        $taskDetail = TaskDetail::all(); // Fetch all task details

        $displayedMonths = [];
        $scheduleCount = 0;

        foreach ($tasks as $task) {
            foreach ($taskGroup as $tg) {
                foreach ($taskDetail as $td) {
                    if ($td->task_group_id == $tg->id && $tg->task_id == $task->id) {
                        $monthYear = $task->month . '-' . $task->year;

                        // Check if the month has already been displayed
                        if (!in_array($monthYear, $displayedMonths)) {
                            // Add the month to the displayed list
                            $displayedMonths[] = $monthYear;
                            $scheduleCount++;
                        }
                    }
                }
            }
        }

        $staffCount = Staff::count();
        $workCount = Work::count();

        $totalMale = Staff::where('gender', 'male')->count();
        $totalFemale = Staff::where('gender', 'female')->count();

        $totalUpper = Work::where('office', 'upper')->count();
        $totalLower = Work::where('office', 'lower')->count();

        return view('dashboard', compact('staffCount', 'workCount', 'scheduleCount', 'totalFemale', 'totalMale', 'totalUpper', 'totalLower'));
    }
    public function plan()
    {
        return view('plan');
    }
}
