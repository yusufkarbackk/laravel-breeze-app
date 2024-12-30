@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="flex flex-row content-center">
        <h2 class="text-lg font-semibold mb-4 mx-5">Task List</h2>
        <a href="/create">
            <button class="bg-orange-400 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                Add Task
            </button>
        </a>
    </div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-4">
        <div class="p-6 bg-white border-b border-gray-200">
            <table id="tasks-table" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($tasks as $task)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $task->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $task->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $task->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $task->is_completed ? 'Completed' : 'Pending' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $task->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tasks-table').DataTable();
    });
</script>
@endsection