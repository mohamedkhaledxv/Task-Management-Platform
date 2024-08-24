@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="relative bg-gray-900 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://source.unsplash.com/random/1600x900" alt="Background Image" class="object-cover w-full h-full">
        <div class="absolute inset-0 bg-black opacity-50"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-24 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-extrabold text-white sm:text-5xl md:text-6xl">
                Welcome to the Task Management App
            </h1>
            <p class="mt-6 text-lg text-gray-300">
                Simplify your workflow and keep track of your tasks effortlessly. Join us and get organized today!
            </p>
            <div class="mt-8 flex justify-center gap-x-6">
                <a href="{{ route('login') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-300">
                    Login
                </a>
                <a href="{{ route('register') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-300">
                    Register
                </a>
            </div>
        </div>
    </div>
</div>

<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900">Why Choose Us?</h2>
            <p class="mt-4 text-lg text-gray-600">Our task management app offers a range of features designed to help you stay organized and productive. Here’s why you should choose us:</p>
        </div>
        <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-gray-900">Organize Your Tasks</h3>
                <p class="mt-2 text-gray-600">Keep all your tasks in one place, with options to set due dates, priorities, and statuses.</p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-gray-900">Collaborate Easily</h3>
                <p class="mt-2 text-gray-600">Work with your team efficiently by sharing tasks and tracking progress together.</p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-gray-900">Stay on Track</h3>
                <p class="mt-2 text-gray-600">Get reminders and notifications to ensure you never miss a deadline or important task.</p>
            </div>
        </div>
    </div>
</div>

@endsection
