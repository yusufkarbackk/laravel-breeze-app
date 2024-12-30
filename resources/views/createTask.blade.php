@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Add New Task</h2>
        <form action="/store" method="POST">
            @csrf
            <!-- Name Input -->
            <div class="mb-4">
                <label for="task" class="block text-gray-700 font-medium mb-2">Task</label>
                <input 
                    type="text" 
                    id="task_name" 
                    name="task" 
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Enter your task"
                />
            </div>

            <!-- Email Input -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea 
                    type="text" 
                    id="desc" 
                    name="description" 
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Enter your description"
                >
                </textarea>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button 
                    type="submit" 
                    class="w-full bg-orange-400 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-lg">
                    Add Task
                </button>
            </div>
        </form>
    </div>
</div>
@endsection