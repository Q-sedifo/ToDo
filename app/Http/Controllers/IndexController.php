<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasklist;
use App\Models\Task;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function home() {
        $tasklists = auth()->user()->tasklists()
            ->orderBy('created_at')
            ->get();

        return view('index.home', compact('tasklists'));
    }

    public function myDay() {
        $today = strtotime(date('d-m-Y'));
        
        // Calculating tasks for today of a certain user
        $tasks = auth()->user()->tasks()
            ->whereBetween('datetime', [$today, $today + 86400])
            ->where('tasklist_id', 0)
            ->orderBy('completed')
            ->get();

        $date = Carbon::now();
        
        return view('index.myday', compact('tasks', 'date'));
    }

    public function taskList($taskListId) {
        $userId = auth()->user()->id;
        $tasklist = auth()->user()->tasklists()->findOrFail($taskListId);

        return view('index.taskList', compact('tasklist'));
    }

    public function account() {
        $user = auth()->user();
        return view('index.account', compact('user'));
    }
}
