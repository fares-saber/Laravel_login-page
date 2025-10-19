<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <i class="fas fa-graduation-cap text-2xl text-blue-600 mr-3"></i>
                    <h1 class="text-2xl font-bold text-gray-900">Student Portal</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-900">Welcome, {{ auth()->user()->name ?? 'Student' }}</p>
                        <p class="text-xs text-gray-500">{{ auth()->user()->email ?? 'student@example.com' }}</p>
                    </div>
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                        {{ substr(auth()->user()->name ?? 'S', 0, 1) }}
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 flex items-center space-x-2">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Section -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl shadow-xl p-8 text-white mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-bold mb-2">Welcome back, {{ auth()->user()->name ?? 'Student' }}! 👋</h2>
                    <p class="text-blue-100 text-lg">Here's your academic overview for today</p>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold">{{ date('l, F j, Y') }}</p>
                    <p class="text-blue-100">Academic Year 2024</p>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">GPA</p>
                        <p class="text-2xl font-bold text-gray-900">3.75</p>
                    </div>
                    <i class="fas fa-chart-line text-2xl text-blue-500"></i>
                </div>
                <p class="text-xs text-green-500 mt-2"><i class="fas fa-arrow-up mr-1"></i>+0.15 from last term</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Attendance</p>
                        <p class="text-2xl font-bold text-gray-900">96%</p>
                    </div>
                    <i class="fas fa-calendar-check text-2xl text-green-500"></i>
                </div>
                <p class="text-xs text-gray-500 mt-2">2 absences this semester</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Assignments</p>
                        <p class="text-2xl font-bold text-gray-900">12</p>
                    </div>
                    <i class="fas fa-tasks text-2xl text-purple-500"></i>
                </div>
                <p class="text-xs text-yellow-500 mt-2">3 pending submissions</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-orange-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Classes</p>
                        <p class="text-2xl font-bold text-gray-900">6</p>
                    </div>
                    <i class="fas fa-book text-2xl text-orange-500"></i>
                </div>
                <p class="text-xs text-gray-500 mt-2">Current enrolled courses</p>
            </div>
        </div>

        <!-- Main Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Schedule Card -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-900">Today's Schedule</h3>
                        <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">Today</span>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center p-4 bg-blue-50 rounded-lg border-l-4 border-blue-500">
                            <div class="bg-blue-500 text-white p-3 rounded-lg mr-4">
                                <i class="fas fa-calculator"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-900">Mathematics</h4>
                                <p class="text-sm text-gray-600">9:00 AM - 10:30 AM</p>
                            </div>
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded">Room 301</span>
                        </div>
                        <div class="flex items-center p-4 bg-purple-50 rounded-lg border-l-4 border-purple-500">
                            <div class="bg-purple-500 text-white p-3 rounded-lg mr-4">
                                <i class="fas fa-flask"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-900">Science Lab</h4>
                                <p class="text-sm text-gray-600">11:00 AM - 12:30 PM</p>
                            </div>
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded">Lab B</span>
                        </div>
                        <div class="flex items-center p-4 bg-orange-50 rounded-lg border-l-4 border-orange-500">
                            <div class="bg-orange-500 text-white p-3 rounded-lg mr-4">
                                <i class="fas fa-language"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-900">English</h4>
                                <p class="text-sm text-gray-600">2:00 PM - 3:30 PM</p>
                            </div>
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded">Room 205</span>
                        </div>
                    </div>
                </div>

                <!-- Recent Grades -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Recent Grades</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b-2 border-gray-200">
                                    <th class="pb-3 text-left text-sm font-semibold text-gray-600">Course</th>
                                    <th class="pb-3 text-left text-sm font-semibold text-gray-600">Assignment</th>
                                    <th class="pb-3 text-left text-sm font-semibold text-gray-600">Grade</th>
                                    <th class="pb-3 text-left text-sm font-semibold text-gray-600">Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="py-3 text-sm font-medium text-gray-900">Mathematics</td>
                                    <td class="py-3 text-sm text-gray-600">Algebra Quiz</td>
                                    <td class="py-3"><span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded-full">A-</span></td>
                                    <td class="py-3 text-sm text-gray-600">Oct 10</td>
                                </tr>
                                <tr>
                                    <td class="py-3 text-sm font-medium text-gray-900">Science</td>
                                    <td class="py-3 text-sm text-gray-600">Lab Report</td>
                                    <td class="py-3"><span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded-full">B+</span></td>
                                    <td class="py-3 text-sm text-gray-600">Oct 8</td>
                                </tr>
                                <tr>
                                    <td class="py-3 text-sm font-medium text-gray-900">English</td>
                                    <td class="py-3 text-sm text-gray-600">Essay Writing</td>
                                    <td class="py-3"><span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded-full">A</span></td>
                                    <td class="py-3 text-sm text-gray-600">Oct 5</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Quick Actions</h3>
                    <div class="space-y-3">
                        <button class="w-full flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition duration-200">
                            <i class="fas fa-book-open text-blue-600 mr-3"></i>
                            <span class="font-medium text-gray-900">View Courses</span>
                        </button>
                        <button class="w-full flex items-center p-3 bg-green-50 hover:bg-green-100 rounded-lg transition duration-200">
                            <i class="fas fa-file-alt text-green-600 mr-3"></i>
                            <span class="font-medium text-gray-900">Assignments</span>
                        </button>
                        <button class="w-full flex items-center p-3 bg-purple-50 hover:bg-purple-100 rounded-lg transition duration-200">
                            <i class="fas fa-chart-bar text-purple-600 mr-3"></i>
                            <span class="font-medium text-gray-900">Grades & Reports</span>
                        </button>
                        <button class="w-full flex items-center p-3 bg-orange-50 hover:bg-orange-100 rounded-lg transition duration-200">
                            <i class="fas fa-calendar text-orange-600 mr-3"></i>
                            <span class="font-medium text-gray-900">Schedule</span>
                        </button>
                    </div>
                </div>

                <!-- Upcoming Deadlines -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Upcoming Deadlines</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-red-50 rounded-lg">
                            <div>
                                <h4 class="font-semibold text-gray-900">Science Project</h4>
                                <p class="text-sm text-gray-600">Due Tomorrow</p>
                            </div>
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-lg">
                            <div>
                                <h4 class="font-semibold text-gray-900">Math Homework</h4>
                                <p class="text-sm text-gray-600">Due in 3 days</p>
                            </div>
                            <i class="fas fa-clock text-yellow-500"></i>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                            <div>
                                <h4 class="font-semibold text-gray-900">English Essay</h4>
                                <p class="text-sm text-gray-600">Due next week</p>
                            </div>
                            <i class="fas fa-check-circle text-blue-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-600">© 2024 Student Portal. All rights reserved.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>