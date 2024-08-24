<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TaskController extends Controller
{
    public function index(){
        $tasks = Auth::user()->tasks;
        return view('tasks.index', compact('tasks'));
    }
    public function create()
{
    return view('tasks.create');
}
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'required|date',
        'priority' => 'required|in:low,medium,high',
    ]);

    Auth::user()->tasks()->create($request->all());

    return redirect()->route('tasks.index');
}
public function edit(Task $task)
{
    return view('tasks.edit', compact('task'));
}
public function update(Request $request, Task $task)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'required|date',
        'priority' => 'required|in:low,medium,high',
    ]);

    $task->update($request->all());

    return redirect()->route('tasks.index');
}
public function destroy(Task $task)
{
    $task->delete();

    return redirect()->route('tasks.index');
}

public function toggleStatus(Task $task)
{
    $task->update(['status' => $task->status === 'completed' ? 'pending' : 'completed']);

    return redirect()->route('tasks.index');
}
}
