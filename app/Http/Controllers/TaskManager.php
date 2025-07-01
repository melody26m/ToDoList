<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Suggestion;

class TaskManager extends Controller
{
    // 📋 Display a list of all tasks (Dashboard)
    public function listTask()
    {
        $tasks = Task::latest()->get(); // Most recent tasks first
        return view("tasks.dashboard", compact("tasks"));
    }

    // ➕ Display the "Add Task" form
    public function addTask()
    {
        return view('tasks.add');
    }

    // 💾 Store a new task
    public function addTaskPost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date',
        ]);

        $task = Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'deadline' => $request->input('deadline'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Task added successfully!');
    }

    // ✅ Mark a task as completed
    public function updateTaskstatus(Task $task)
    {
        $task->update(['status' => 'completed']);

        return redirect()->route("dashboard")->with('success', 'Task marked as completed!');
    }

    // 🔍 Show a specific task with its suggestions
    public function show(Task $task)
    {
        $suggestions = $task->suggestions()->latest()->get();
        return view('tasks.welcome', compact('task', 'suggestions'));
    }

    // 💬 Store a suggestion for a specific task
    public function addSuggestion(Request $request, Task $task)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'author' => 'nullable|string|max:100',
        ]);

        $task->suggestions()->create([
            'content' => $request->input('content'),
            'author' => $request->input('author'),
        ]);

        return redirect()->route('task.show', $task->id)->with('success', 'Suggestion added successfully!');
    }

    // ✏️ Show edit form for a task
    public function editTask(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // 💾 Update task info
    public function updateTask(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date',
        ]);

        $task->update($request->only(['title', 'description', 'deadline']));

        return redirect()->route('dashboard')->with('success', 'Task updated successfully!');

    }

    public function deleteTask(Task $task)
{
    $task->delete();
    return redirect()->route('dashboard')->with('success', 'Task deleted successfully.');
}

}
