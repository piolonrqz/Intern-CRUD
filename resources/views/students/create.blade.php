@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-sm mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Add New Student</h2>
            <p class="mt-1 text-sm text-gray-500">Complete student registration details</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white shadow-sm rounded-xl overflow-hidden">
            <form action="{{ route('students.store') }}" method="POST" class="p-6 space-y-4">
                @csrf

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        required 
                        class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg 
                               focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 
                               placeholder-gray-400 transition-colors duration-200"
                        placeholder="Enter student's name"
                    >
                </div>

                <!-- Course Field -->
                <div>
                    <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
                    <input 
                        type="text" 
                        name="course" 
                        id="course" 
                        required 
                        class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg 
                               focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 
                               placeholder-gray-400 transition-colors duration-200"
                        placeholder="e.g., Computer Science"
                    >
                </div>

                <!-- Institution Field -->
                <div>
                    <label for="institution" class="block text-sm font-medium text-gray-700">Institution</label>
                    <input 
                        type="text" 
                        name="institution" 
                        id="institution" 
                        required 
                        class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg 
                               focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 
                               placeholder-gray-400 transition-colors duration-200"
                        placeholder="Enter institution name"
                    >
                </div>

                <!-- Career Path Field -->
                <div>
                    <label for="career_path" class="block text-sm font-medium text-gray-700">Career Path</label>
                    <input 
                        type="text" 
                        name="career_path" 
                        id="career_path" 
                        required 
                        class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg 
                               focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 
                               placeholder-gray-400 transition-colors duration-200"
                        placeholder="e.g., Software Developer"
                    >
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-3 pt-2">
                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="flex-1 bg-blue-500 text-white px-4 py-2 text-sm font-medium rounded-lg
                               hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 
                               focus:ring-blue-500 transition-colors duration-200"
                    >
                        Add Student
                    </button>

                    <!-- Back Button -->
                    <a 
                        href="{{ route('students.index') }}" 
                        class="flex-1 bg-gray-100 text-gray-700 px-4 py-2 text-sm font-medium rounded-lg
                               hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 
                               focus:ring-gray-500 transition-colors duration-200 text-center"
                    >
                        Back to List
                    </a>
                </div>
            </form>
        </div>

        <!-- Help Text -->
        <div class="mt-4 text-center">
            <p class="text-xs text-gray-500">
                All fields are required
            </p>
        </div>
    </div>
</div>
@endsection