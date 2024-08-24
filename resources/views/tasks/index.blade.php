@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">My Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Create New Task
    </a>
</div>

@if($tasks->isEmpty())
    <p class="text-gray-600">You have no tasks.</p>
@else
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <ul>
            @foreach($tasks as $task)
                <li class="px-4 py-4 sm:px-6 border-b">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $task->title }}</h3>
                            <p class="text-sm text-gray-600">{{ $task->due_date }}</p>
                        </div>
                        <div>
                            <form action="{{ route('tasks.status', $task) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="text-sm text-{{ $task->status === 'completed' ? 'green' : 'yellow' }}-500 hover:underline">
                                    Mark as {{ $task->status === 'completed' ? 'Pending' : 'Completed' }}
                                </button>
                            </form>
                            <a href="{{ route('tasks.edit', $task) }}" class="text-sm text-blue-500 hover:underline ml-4">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-500 hover:underline">Delete</button>
                            </form>
                        </div>
                    </div>
                    <p class="mt-2 text-sm text-gray-600">{{ $task->description }}</p>
                </li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
