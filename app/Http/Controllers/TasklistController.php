<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasklist;

class TasklistController extends Controller
{
    public function create(Request $request) {
        $newTaskList = Tasklist::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id
        ]);

        return $newTaskList;
    }   

    public function delete($tasklistId) {
        $tasklist = Tasklist::findOrFail($tasklistId);
        $tasklist->tasks()->delete();
        $tasklist->delete();

        return redirect()->route('home');
    }
}
