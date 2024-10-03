<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use App\Models\Staff;
use App\Models\TaskGroup;
use App\Models\Work;
use App\Models\Task;
use App\Models\TaskDetail;

class ScheduleController extends Controller
{
    public function getLowerWorks()
    {
        return Work::where('office', 'lower')->get();
    }

    public function getUpperWorks()
    {
        return Work::where('office', 'upper')->get();
    }

    public function index(Request $request)
    {
        // Get the month from the query parameter or default to current month
        $month = $request->query('month', date('n'));

        $staffs = Staff::all();
        $upperWorks = $this->getUpperWorks();
        $lowerWorks = $this->getLowerWorks();
        $taskGroup = TaskGroup::where('task_id', $month)->get(); // Assuming Work is the model for the works table


        // Return the view with the month variable and other data
        return view('schedule.index', compact('month', 'staffs', 'taskGroup'), [
            'upperWorks' => $upperWorks,
            'lowerWorks' => $lowerWorks,
        ]);
    }

    public function test(Request $request)
    {
        $id = $request->input('task');
        $task = $this->findTask($id);
        $mode = null;

        return view('schedule.test', compact('task'),[
            'mode' => $mode,
        ]);
    }

    public function list()
    {
        $tasks = Task::all();
        $taskGroup = TaskGroup::all();
        $taskDetail = TaskDetail::all();
        return view('schedule.list', compact('tasks', 'taskGroup', 'taskDetail'));
    }

    public function edit($id)
    {
        $mode = 'edit';
        $task = $this->findTask($id);
        $taskGroup = TaskGroup::with([
            'taskDetails.work'
        ])->where('task_id', $task->id)->get();  // Assuming Work is the model for the works table

        return view('schedule.edit', compact(/
            'task', 'taskGroup'),[
                'mode' => $mode,
            ]);
    }
    public function template(Request $request)
    {
        // Get the month from the query parameter or default to current month
        $id = $request->query('id');

        $staffs = Staff::withTrashed()->get();
        $upperWorks = $this->getUpperWorks();
        $lowerWorks = $this->getLowerWorks();
        $taskGroup = TaskGroup::where('task_id', $id)->get();
        $taskDetail = TaskDetail::all();


        // Return the view with the month variable and other data
        return view('schedule.template', compact('staffs', 'taskGroup', 'taskDetail'), [
            'upperWorks' => $upperWorks,
            'lowerWorks' => $lowerWorks,
        ]);
    }

    public function getNames()
    {
        try {
            // Fetch names from the database or any other source
            $names = Staff::pluck('name'); // Assuming 'name' is the column in your staff table

            return response()->json($names);
        } catch (\Exception $e) {
            // Handle errors if necessary
            return response()->json(['error' => 'Failed to fetch names'], 500);
        }
    }

    public function generatePdf(Request $request)
    {
        $id = $request->input('id');
        $task = $this->findTask($id);

        $staffs = Staff::withTrashed()->get();
        $upperWorks = $this->getUpperWorks();
        $lowerWorks = $this->getLowerWorks();
        $taskGroup = TaskGroup::where('task_id', $id)->get();
        $taskDetail = TaskDetail::all();

        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Render the template HTML
        $html = view('schedule.template', compact('staffs', 'taskGroup', 'taskDetail'), [
            'upperWorks' => $upperWorks,
            'lowerWorks' => $lowerWorks,
            'month' => $task->month
        ])->render();

        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the PDF
        $dompdf->render();

        // Generate a unique file name based on the selected month
        $fileName = 'schedule_' . $task->year . '_' . $task->month . '.pdf';

        // Stream the PDF to the browser with the dynamically generated filename
        return $dompdf->stream($fileName);
    }

    public function destroy($id)
    {
        // $taskGroup = TaskGroup::where('task_id', $id)->get();
        // foreach($taskGroup as $tg)
        // {
        //     $taskDetail = TaskDetail::where('task_group_id', $tg->id)->get();
        //     foreach($taskDetail as $td)
        //     {
        //         $td->delete();
        //     }
        // }
        $task = $this->findTask($id);
        $task->delete();

        return redirect()->route('schedule.list')->with('success', 'schedule deleted successfully.');
    }
    
    public function findTask($id)
    {
        return Task::findOrFail($id);
    }
}
