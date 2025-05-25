<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management Dashboard</title>
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
    <aside id="sidebar" class="w-64 bg-gray-800 text-white flex flex-col p-4 shadow-lg transition-all duration-300 ease-in-out">
        <div class="text-2xl font-bold mb-8 text-indigo-400">Hospital HMS</div>
        <nav class="flex-1">
            <ul>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg bg-gray-700 text-indigo-300">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Dashboard
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Inpatient
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        Outpatient
                    </a>
                </li>
            </ul>
        </nav>
        <div class="mt-auto">
            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Logout
            </a>
        </div>
    </aside>

    <div id="main-content-area" class="flex-1 flex flex-col bg-gray-100 overflow-y-auto">
        <header class="bg-white shadow-md p-4 flex items-center justify-between sticky top-0 z-10">
            <div class="flex items-center">
                <button id="sidebar-toggle" class="p-2 mr-4 rounded-full bg-gray-200 text-gray-600 hover:bg-gray-300 transition-colors duration-200">
                    <span id="sidebar-icon-container">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </span>
                </button>
                <h1 class="text-3xl font-semibold text-gray-800">Hospital Operations</h1>
            </div>
        </header>

        <main class="p-6 flex-1">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Staff Management -->
            <div class="bg-white rounded-xl shadow-lg p-6 transition-transform transform hover:scale-105 hover:shadow-xl duration-300">
                <h2 class="text-xl font-semibold text-gray-800 mb-3">Staff Management</h2>
                <p class="text-gray-600">View and add staff, allocate shifts, and track their experience and qualifications.</p>
                <a href="{{ url('staff') }}">
                <button class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200 shadow-md">Manage Staff</button>
                </a>
            </div>

            <!-- Staff Search -->
            <div class="bg-white rounded-xl shadow-lg p-6 transition-transform transform hover:scale-105 hover:shadow-xl duration-300">
                <h2 class="text-xl font-semibold text-gray-800 mb-3">Staff Search</h2>
                <p class="text-gray-600">Search for staff members by qualifications or previous work experience.</p>
                <a href="{{ url('staff/search') }}">
                <button class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200 shadow-md">Search Staff</button>
                </a>
            </div>

            <!-- Wards Management (moved up) -->
            <div class="bg-white rounded-xl shadow-lg p-6 transition-transform transform hover:scale-105 hover:shadow-xl duration-300">
                <h2 class="text-xl font-semibold text-gray-800 mb-3">Wards Management</h2>
                <p class="text-gray-600">Assign wards to patients and track their in-patient stays efficiently.</p>
                <a href="{{ url('wards') }}">
                    <button class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200 shadow-md">Manage Wards</button>
                </a>
            </div>

            <!-- Patient Registration (moved down) -->
            <div class="bg-white rounded-xl shadow-lg p-6 transition-transform transform hover:scale-105 hover:shadow-xl duration-300">
                <h2 class="text-xl font-semibold text-gray-800 mb-3">Patient Registration</h2>
                <p class="text-gray-600">Add, view, and edit patient information, including links to doctors and next-of-kin details.</p>
                <button class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200 shadow-md">Manage Patients</button>
            </div>

            <!-- Appointments -->
            <div class="bg-white rounded-xl shadow-lg p-6 transition-transform transform hover:scale-105 hover:shadow-xl duration-300">
                <h2 class="text-xl font-semibold text-gray-800 mb-3">Appointments</h2>
                <p class="text-gray-600">Facilitate the booking of appointments between patients and medical staff.</p>
                <button class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200 shadow-md">Book Appointments</button>
            </div>

            <!-- Medication Tracker -->
            <div class="bg-white rounded-xl shadow-lg p-6 transition-transform transform hover:scale-105 hover:shadow-xl duration-300">
                <h2 class="text-xl font-semibold text-gray-800 mb-3">Medication Tracker</h2>
                <p class="text-gray-600">Assign and view patient medications, ensuring proper dosage and schedule adherence.</p>
                <button class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200 shadow-md">Track Medications</button>
            </div>

            <!-- Requisition Module -->
            <div class="bg-white rounded-xl shadow-lg p-6 transition-transform transform hover:scale-105 hover:shadow-xl duration-300">
                <h2 class="text-xl font-semibold text-gray-800 mb-3">Requisition Module</h2>
                <p class="text-gray-600">Request and manage various medical items and supplies within the hospital.</p>
                <button class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200 shadow-md">Manage Requisitions</button>
            </div>

            <!-- Inventory Management -->
            <div class="bg-white rounded-xl shadow-lg p-6 transition-transform transform hover:scale-105 hover:shadow-xl duration-300">
                <h2 class="text-xl font-semibold text-gray-800 mb-3">Inventory Management</h2>
                <p class="text-gray-600">View and manage pharmaceutical and surgical supplies inventory levels.</p>
                <button class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200 shadow-md">Manage Inventory</button>
            </div>

            <!-- Supplier Portal -->
            <div class="bg-white rounded-xl shadow-lg p-6 transition-transform transform hover:scale-105 hover:shadow-xl duration-300">
                <h2 class="text-xl font-semibold text-gray-800 mb-3">Supplier Portal</h2>
                <p class="text-gray-600">Add and manage information for all medical suppliers and vendors.</p>
                <button class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200 shadow-md">Manage Suppliers</button>
            </div>
            </div>
        </main>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarIconContainer = document.getElementById('sidebar-icon-container');

        const burgerIcon = `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>`;
        const closeIcon = `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>`;

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
