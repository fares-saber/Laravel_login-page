@extends('layouts.app')

@section('title', 'Students')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Students</h1>
        <a href="{{ route('admin.students.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-plus mr-2"></i>Add Student
        </a>
    </div>

    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Phone</th>
                    <th class="py-3 px-6 text-left">Class</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($students as $student)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $student->id }}</td>
                    <td class="py-3 px-6 text-left">{{ $student->name }}</td>
                    <td class="py-3 px-6 text-left">{{ $student->email }}</td>
                    <td class="py-3 px-6 text-left">{{ $student->phone }}</td>
                    <td class="py-3 px-6 text-left">{{ $student->class->class_name ?? 'N/A' }}</td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center">
                            <a href="{{ route('admin.students.edit', $student) }}" class="w-4 mr-2 transform hover:text-green-500 hover:scale-110">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.students.destroy', $student) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
<!-- credit :eng/mohamed algandor
made by Fares  -->