<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    public function index() {
        $tasks = auth()->user()->tasks;
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
}
