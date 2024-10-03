<?php
namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskGroup;
use App\Models\TaskDetail; 
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function calculateWeeks($month)
    {
        $year = 2024;
        $selectedMonth = $month;
        // Find the task_id based on month and year
        $task = Task::where('month', $selectedMonth)
                    ->where('year', $year)
                    ->first();

        if (!$task) {
            // Handle case where task for given month and year is not found
            return redirect()->back()->with('error', 'Task not found for the specified month and year.');
        }

        // Calculate weeks as before
        $currentDate = strtotime("$year-$selectedMonth-01");
        $monthEnd = strtotime(date("Y-m-t", strtotime("$year-$selectedMonth")));
        $week = 1;

        while ($currentDate <= $monthEnd) {
            $weekStart = $currentDate;
            $weekEnd = strtotime('next saturday', $currentDate);

            if ($weekEnd > $monthEnd) {
                $weekEnd = $monthEnd;
            }

            // Format the dates
            $weekStartDate = date('Y-m-d', $weekStart);
            $weekEndDate = date('Y-m-d', $weekEnd);

            // Check if a TaskGroup with the same task_id already exists
            $existingTaskGroup = TaskGroup::where('task_id', $task->id)
            ->where('weekStart', $weekStartDate)
            ->where('weekEnd', $weekEndDate)
            ->first();

            if (!$existingTaskGroup) {
            // Save to task_groups table only if it doesn't already exist
            $taskGroup = new TaskGroup();
            $taskGroup->task_id = $task->id; // Use the found task_id
            $taskGroup->week = $week;
            $taskGroup->weekStart = $weekStartDate;
            $taskGroup->weekEnd = $weekEndDate;
            $taskGroup->save();
            }

            // Move to the next week
            $currentDate = strtotime('+1 day', $weekEnd + 1);
            $week++;
        }

        // Redirect back with the selected month as a query parameter
        return redirect()->route('schedule.index', ['month' => $selectedMonth])
        ->with('success', 'Month stored successfully.');

    }

    public function storeTaskDetails(Request $request)
    {
        $selectedMonth = $request->session()->get('selectedMonth', date('n'));
        $request->session()->put('selectedMonth', $selectedMonth);

        try {
            $selectedValues = $request->input('selectedValues');

            if (!is_array($selectedValues)) {
                throw new \Exception('Invalid input format');
            }

            foreach ($selectedValues as $value) {
                $data = explode('|', $value);
                if (count($data) === 3) {
                    list($task_id, $work_id, $staff_id) = $data;

                    // Use updateOrCreate to either update existing data or create new data
                    TaskDetail::updateOrCreate(
                        ['task_group_id' => $task_id, 'work_id' => $work_id],
                        ['staff_id' => $staff_id]
                    );
                } else {
                    throw new \Exception('Invalid input data');
                }
            }

            // Redirect to schedule.index on success
            return redirect()->route('schedule.list', ['month' => $selectedMonth])->with('success', 'Task details stored successfully');
        } catch (\Exception $e) {
            // Redirect back with error message on exception
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}


