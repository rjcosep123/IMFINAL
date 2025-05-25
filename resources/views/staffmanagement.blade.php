<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #e0e0e0;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>
<body class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-gray-800 text-white flex flex-col p-4 shadow-lg transition-all duration-300 ease-in-out">
        <div class="text-2xl font-bold mb-8 text-indigo-400">Hospital HMS</div>
        <nav class="flex-1">
            <ul>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg bg-gray-700 text-indigo-300">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10h3m10-11l2 2v10h-3m-6 0a1 1 0 001-1v-4h2v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Dashboard
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-700">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Inpatient
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-700">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Outpatient
                    </a>
                </li>
            </ul>
        </nav>
        <div class="mt-auto">
            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Logout
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <div id="main-content-area" class="flex-1 flex flex-col bg-gray-100 overflow-y-auto">
        <!-- Header -->
        <header class="bg-white shadow-md p-4 flex items-center justify-between sticky top-0 z-10">
            <div class="flex items-center">
                <button id="sidebar-toggle" class="p-2 mr-4 rounded-full bg-gray-200 text-gray-600 hover:bg-gray-300">
                    <span id="sidebar-icon-container">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </span>
                </button>
                <h1 class="text-2xl font-bold text-gray-800">Staff Management</h1>
            </div>
            <a href="{{ route('staff.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                + Add New Staff
            </a>
        </header>

        <!-- Main Table Section -->
        <main class="flex-1 p-6">
            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg shadow overflow-hidden">
                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <tr>
                            <th class="py-3 px-6 text-left">Staff ID</th>
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-left">Role</th>
                            <th class="py-3 px-6 text-left">Status</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm">
                        @forelse ($staff as $member)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="py-3 px-6">{{ $member->staff_id }}</td>
                                <td class="py-3 px-6">{{ $member->first_name }} {{ $member->last_name }}</td>
                                <td class="py-3 px-6">{{ $member->job_title }}</td>
                                <td class="py-3 px-6">
                                    <span class="inline-block px-2 py-1 text-xs rounded 
                                        {{ $member->status === 'Active' ? 'bg-green-200 text-green-800' : 
                                           ($member->status === 'On Leave' ? 'bg-yellow-200 text-yellow-800' : 'bg-red-200 text-red-800') }}">
                                        {{ $member->status }}
                                    </span>
                                </td>
                                <td class="py-3 px-6">{{ $member->contact_email }}</td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center space-x-4">
                                        <a href="{{ route('staff.edit', $member->staff_id) }}" class="text-blue-600 hover:text-blue-800 font-semibold">Edit</a>
                                        <form action="{{ route('staff.destroy', $member->staff_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this staff member?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-800 font-semibold">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-4 px-6 text-center text-gray-500">No staff found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarIconContainer = document.getElementById('sidebar-icon-container');

        const burgerIcon = `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>`;
        const closeIcon = `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>`;

        let isSidebarOpen = true;

        function updateSidebarIcon() {
            sidebarIconContainer.innerHTML = isSidebarOpen ? burgerIcon : closeIcon;
        }

        updateSidebarIcon();

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('p-4');
            sidebar.classList.toggle('w-0');
            sidebar.classList.toggle('p-0');
            sidebar.classList.toggle('overflow-hidden');

            isSidebarOpen = !isSidebarOpen;
            updateSidebarIcon();
        });
    </script>
</body>
</html>
