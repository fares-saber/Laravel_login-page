<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    @auth
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-blue-800 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <div class="text-white flex items-center space-x-2 px-4">
                <i class="fas fa-school text-2xl"></i>
                <span class="text-2xl font-extrabold">SchoolMS</span>
            </div>
            <nav>
                <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                    <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                </a>
                <a href="{{ route('admin.students.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                    <i class="fas fa-users mr-2"></i>Students
                </a>
                <a href="{{ route('admin.teachers.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                    <i class="fas fa-chalkboard-teacher mr-2"></i>Teachers
                </a>
                <a href="{{ route('admin.classes.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                    <i class="fas fa-door-open mr-2"></i>Classes
                </a>
                <a href="{{ route('admin.subjects.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                    <i class="fas fa-book mr-2"></i>Subjects
                </a>
                <a href="{{ route('admin.attendance.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                    <i class="fas fa-clipboard-check mr-2"></i>Attendance
                </a>
                <a href="{{ route('admin.reports.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                    <i class="fas fa-chart-bar mr-2"></i>Reports
                </a>
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    </button>
                </form>
            </nav>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow">
                <div class="flex justify-between items-center py-4 px-6">
                    <div class="flex items-center">
                        <button class="text-gray-500 focus:outline-none lg:hidden" id="sidebarToggle">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h1 class="text-2xl font-semibold text-gray-800 ml-4">@yield('title', 'Dashboard')</h1>
                    </div>
                    <div class="flex items-center">
                        <span class="text-gray-700 mr-4">Welcome, {{ Auth::user()->name }}</span>
                    </div>
                </div>
            </header>

            <!-- Page content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Mobile sidebar toggle
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.bg-blue-800');
            const toggleButton = document.getElementById('sidebarToggle');
            
            if (toggleButton) {
                toggleButton.addEventListener('click', function() {
                    sidebar.classList.toggle('-translate-x-full');
                });
            }
        });
    </script>
    @else
        @yield('content')
    @endauth
</body>
</html>