<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Add this import

class DashboardController extends Controller
{
    public function index()
    {
        $totalTasks = Task::count();
        $completedTasks = Task::where('completed', true)->count();
        $tasksByDueDate = Task::selectRaw('DATE(due_date) as due_date, count(*) as task_count')
                            ->groupBy(DB::raw('DATE(due_date)'))
                            ->get();

        return view('dashboard.index', compact('totalTasks', 'completedTasks', 'tasksByDueDate'));
    }
}
