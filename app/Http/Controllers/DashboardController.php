<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; 

class DashboardController extends Controller
{
    public function index()
    {
        // 총 작업 수
        $totalTasks = Task::count();

        // 완료된 작업 수
        $completedTasks = Task::where('completed', true)->count();

        // 마감일별 작업 그룹화
        $tasksByDueDate = Task::selectRaw('due_date, count(*) as task_count')
                                ->groupBy('due_date')
                                ->get();

        // 데이터를 뷰로 전달
        return view('dashboard', compact('totalTasks', 'completedTasks', 'tasksByDueDate'));
    }
}