<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskManager extends Controller
{
    public function listTask()
    {
        $tasks = Task::where('user_id', Auth::id())
                     ->latest()
                     ->paginate(1000000); 
        return view("tasks.dashboard", compact("tasks"));
    }

    public function addTask()
    {
        return view('tasks.add');
    }

    public function addTaskPost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'user_id' => Auth::id(), 
        ]);

        return redirect()->route('dashboard')->with('success', 'Task added successfully!');
    }

    

    public function editTask(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('tasks.edit', compact('task'));
    }

    public function updateTask(Request $request, Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

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
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $task->delete();
        return redirect()->route('dashboard')->with('success', 'Task deleted successfully.');
    }

    public function toggleStatus($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $task = Task::findOrFail($id);

        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $task->status = $task->status === 'completed' ? 'pending' : 'completed';
        $task->save();

        return back()->with('success', 'Task status updated!');
    }
}
