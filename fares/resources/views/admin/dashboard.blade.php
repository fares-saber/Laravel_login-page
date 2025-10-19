@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-500 text-white mr-4">
                    <i class="fas fa-users text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Students</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['students'] }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-500 text-white mr-4">
                    <i class="fas fa-chalkboard-teacher text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Teachers</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['teachers'] }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-500 text-white mr-4">
                    <i class="fas fa-door-open text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Classes</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['classes'] }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-red-500 text-white mr-4">
                    <i class="fas fa-clipboard-check text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Attendance Today</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['attendance_today'] }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.students.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-4 rounded-lg text-center transition duration-200">
                <i class="fas fa-users text-2xl mb-2"></i>
                <p>Manage Students</p>
            </a>
            <a href="{{ route('admin.teachers.index') }}" class="bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-lg text-center transition duration-200">
                <i class="fas fa-chalkboard-teacher text-2xl mb-2"></i>
                <p>Manage Teachers</p>
            </a>
            <a href="{{ route('admin.attendance.index') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-3 px-4 rounded-lg text-center transition duration-200">
                <i class="fas fa-clipboard-check text-2xl mb-2"></i>
                <p>Take Attendance</p>
            </a>
            <a href="{{ route('admin.reports.index') }}" class="bg-red-500 hover:bg-red-600 text-white py-3 px-4 rounded-lg text-center transition duration-200">
                <i class="fas fa-chart-bar text-2xl mb-2"></i>
                <p>Generate Report</p>
            </a>
        </div>
    </div>
</div>
@endsection
<!-- credit :eng/mohamed algandor
made by Fares  -->