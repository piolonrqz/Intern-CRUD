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

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-500">
                    <thead class="bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                Course
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                Institution
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                Career Path
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($students as $student)
                            <tr class="hover:bg-blue-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $student->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-700">{{ $student->course }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-700">{{ $student->institution }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-700">{{ $student->career_path }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center gap-3">
                                        <button 
                                            onclick="window.location.href='{{ route('students.edit', $student->id) }}'" 
                                            class="inline-flex items-center px-3 py-1.5 bg-green-400 text-white text-sm font-medium rounded-md
                                                   hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300
                                                   transition-colors duration-200">
                                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                            </svg>
                                            Edit
                                        </button>

                                        <button 
                                            onclick="showModal({{ $student->id }})" 
                                            class="inline-flex items-center px-3 py-1.5 bg-red-400 text-white text-sm font-medium rounded-md
                                                   hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-300
                                                   transition-colors duration-200">
                                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No students found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="confirmationModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
        <h2 class="text-lg font-semibold text-gray-800">Are you sure?</h2>
        <p class="mt-2 text-sm text-gray-600">Do you really want to delete this record? This action cannot be undone.</p>
        <div class="mt-4 flex justify-end gap-3">
            <button onclick="hideModal()" class="px-4 py-2 bg-gray-300 rounded-md text-gray-800 hover:bg-gray-400">Cancel</button>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Delete</button>
            </form>
        </div>
    </div>
</div>

<script>
    function showModal(studentId) {
        const modal = document.getElementById('confirmationModal');
        modal.classList.remove('hidden');
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `/students/${studentId}`;
    }

    function hideModal() {
        const modal = document.getElementById('confirmationModal');
        modal.classList.add('hidden');
    }
</script>
@endsection
