<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return response()->json(Task::all());
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        $task = Task::create(['title' => $request->title]);
        return response()->json($task);
    }

    public function update($id)
    {
        $task = Task::findOrFail($id);
        $task->update(['completed' => !$task->completed]);
        return response()->json(['message' => 'Task updated']);
    }

    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        return response()->json(['message' => 'Task deleted']);
    }
}
