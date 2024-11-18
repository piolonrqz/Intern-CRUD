@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Edit Student Details</h2>
            <p class="mt-1 text-sm text-gray-500">Update the student's information below</p>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4">
                    <div class="flex items-center mb-2">
                        <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="ml-2 font-medium text-red-800">Please correct the following errors:</span>
                    </div>
                    <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Edit Form -->
            <form action="{{ route('students.update', $student->id) }}" method="POST" class="p-6 space-y-5">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <div class="mt-1">
                        <input type="text" 
                               name="name" 
                               id="name" 
                               value="{{ old('name', $student->name) }}"
                               required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm 
                                      focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 
                                      placeholder-gray-400 transition duration-150"
                               placeholder="Enter student's full name">
                    </div>
                </div>

                <!-- Course Field -->
                <div>
                    <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
                    <div class="mt-1">
                        <input type="text" 
                               name="course" 
                               id="course" 
                               value="{{ old('course', $student->course) }}"
                               required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm 
                                      focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 
                                      placeholder-gray-400 transition duration-150"
                               placeholder="e.g., Computer Science">
                    </div>
                </div>

                <!-- Institution Field -->
                <div>
                    <label for="institution" class="block text-sm font-medium text-gray-700">Institution</label>
                    <div class="mt-1">
                        <input type="text" 
                               name="institution" 
                               id="institution" 
                               value="{{ old('institution', $student->institution) }}"
                               required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm 
                                      focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 
                                      placeholder-gray-400 transition duration-150"
                               placeholder="Enter institution name">
                    </div>
                </div>

                <!-- Career Path Field -->
                <div>
                    <label for="career_path" class="block text-sm font-medium text-gray-700">Career Path</label>
                    <div class="mt-1">
                        <input type="text" 
                               name="career_path" 
                               id="career_path" 
                               value="{{ old('career_path', $student->career_path) }}"
                               required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm 
                                      focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 
                                      placeholder-gray-400 transition duration-150"
                               placeholder="e.g., Software Developer">
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-3 pt-2">
                    <button type="submit" 
                            class="flex-1 bg-blue-600 text-black px-4 py-2 text-sm font-medium rounded-lg
                                   hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 
                                   focus:ring-blue-500 transition-colors duration-200">
                        Update Student
                    </button>
                    <a href="{{ route('students.index') }}" 
                       class="flex-1 bg-gray-100 text-gray-700 px-4 py-2 text-sm font-medium rounded-lg
                              hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 
                              focus:ring-gray-500 transition-colors duration-200 text-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>

        <!-- Quick Navigation -->
        <div class="mt-6 text-center">
            <a href="{{ route('students.index') }}" 
               class="inline-flex items-center text-sm text-indigo-600 hover:text-indigo-500">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Student List
            </a>
        </div>
    </div>
</div>
@endsection