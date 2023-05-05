<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function taskCreate(Request $request) {
        // $data = $request->validated();
        $data = $request;
        
        $task = Task::create([
            'user_id' => auth()->user()->id,
            'content' => $data['name'],
            'time' => $data['time'],
            'tasklist_id' => $data['tasklist'],
            'datetime' => time()
        ]);

        return $task;
    }

    public function taskComplete(Request $request, $taskId) {
        $task = Task::findOrFail($taskId);

        $task->completed = $task->completed ? 0 : 1;
        $task->save();
        
        if ($request->ajax()) return true;
        return back();
    }

    public function taskDelete(Request $request, $taskId) {
        $task = Task::findOrFail($taskId)->delete();

        if ($request->ajax()) return true; 
        return back();
    }
}
