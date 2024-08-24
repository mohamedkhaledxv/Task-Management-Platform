@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Profile</h2>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
            <input type="text" name="username" id="username" value="{{ old('username', auth()->user()->username) }}" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('username')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update Profile
            </button>
        </div>
    </form>
</div>

<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg px-8 pt-6 pb-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">My Tasks</h2>

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
                                <p class="text-sm text-gray-600">Due: {{ $task->due_date }}</p>
                                <p class="text-sm text-gray-600">Priority: {{ ucfirst($task->priority) }}</p>
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
</div>
@endsection
