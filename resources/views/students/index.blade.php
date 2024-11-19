@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="bg-blue-100 rounded-xl shadow-sm p-6 mb-6">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-blue-900">Student List</h1>
                    <p class="mt-1 text-sm text-blue-700">Manage and view all registered students</p>
                </div>
                <button 
                    onclick="window.location.href='{{ route('students.create') }}'"
                    class="inline-flex items-center px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg
                           hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400
                           transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Add New Student
                </button>
            </div>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="rounded-lg bg-green-100 p-4 mb-6 border border-green-300">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif
        <livewire:student-record/>
        
            </div>
        </div>
    </div>
</div>

@endsection
