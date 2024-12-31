<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    public function index() {
        $tasks = Task::where('user_id', auth()->id())
            ->orderBy('is_completed', 'desc')
            ->get();
        return view('dashboard', compact('tasks'));
    }

    public function create() {
        return view('createTask');
    }

    public function store(Request $request) {
        try {
            $validate = $request->validate([
                'task' => 'required',
                'description' => 'required'
            ]);
            Task::create([
                'title' => $validate['task'],
                'description' => $validate['description'],
                'user_id' => auth()->id()
            ]);
            return redirect('/dashboard')->with('success', 'Success to submit task!');
        } catch (\Throwable $th) {
            return redirect('/dashboard')->with('failed', 'Failed to submit task!');
        }
    }

    public function markComplete(Request $request, Task $task)
    {
        // Check if the authenticated user owns the task
        if ($task->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        // Toggle the is_completed status
        $task->update([
            'is_completed' => !$task->is_completed,
        ]);

        return redirect()->route('dashboard')->with('success', 'Task updated successfully!');
    }

    public function complete(Request $request) {
        
    }
}
