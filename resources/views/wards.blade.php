<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wards Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6; /* Light gray background */
        }
        /* Custom scrollbar for better aesthetics */
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
        #sidebar.collapsed {
            width: 4rem; /* Collapsed width */
        }
        #sidebar.collapsed .text-2xl,
        #sidebar.collapsed nav ul li a span,
        #sidebar.collapsed .mt-auto a span {
            display: none;
        }
         #sidebar.collapsed nav ul li a svg {
            margin-right: 0;
        }
        #sidebar.collapsed .text-2xl {
             text-align: center;
             font-size: 1.5rem; /* Adjust as needed */
         }
        #sidebar.collapsed .text-2xl::before {
             content: "H"; /* Or your desired collapsed logo/text */
         }

    </style>
</head>
<body class="flex h-screen overflow-hidden">

    <aside id="sidebar" class="w-64 bg-gray-800 text-white flex flex-col p-4 shadow-lg transition-all duration-300 ease-in-out">
        <div class="text-2xl font-bold mb-8 text-indigo-400"><span>Hospital HMS</span></div>
        <nav class="flex-1">
            <ul>
                <li class="mb-2">
                    <a href="index.html" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Inpatient</span>
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        <span>Outpatient</span>
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg bg-gray-700 text-indigo-300">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                        <span>Wards Management</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="mt-auto">
            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <div id="main-content-area" class="flex-1 flex flex-col bg-gray-100 overflow-y-auto">
        <header class="bg-white shadow-md p-4 flex items-center justify-between sticky top-0 z-10">
            <div class="flex items-center">
                <button id="sidebar-toggle" class="p-2 mr-4 rounded-full bg-gray-200 text-gray-600 hover:bg-gray-300 transition-colors duration-200">
                     <span id="sidebar-icon-container">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </span>
                </button>
                <h1 class="text-3xl font-semibold text-gray-800">Wards Management</h1>
            </div>
             <div class="flex items-center space-x-4">
                 <div class="relative">
                     <input type="text" id="searchInput" placeholder="Search by name, number, location..." class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                     <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">🔍</span>
                 </div>
                 <a href="add_new_ward.html" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                     + Add New Ward
                 </a>
             </div>
        </header>

        <main class="flex-1 p-4 md:p-6">
            <div class="bg-white rounded-lg shadow-md p-4 md:p-6">

                <div class="mb-6 bg-blue-50 p-4 rounded-lg border border-blue-200">
                    <h3 class="text-lg font-semibold text-blue-800 mb-2">Hospital Ward Overview</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-gray-700">
                        <div><span class="font-bold">Total Wards:</span> 17</div>
                        <div><span class="font-bold">Total Beds (In-patient):</span> 240</div>
                        <div><span class="font-bold">Out-patient Clinic:</span> Available</div>
                    </div>
                </div>

                <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                    <div class="flex flex-wrap items-center space-x-4">
                        <div>
                            <label for="wardTypeFilter" class="block text-sm font-medium text-gray-700 mb-1">Filter by Ward Name/Type:</label>
                            <select id="wardTypeFilter" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="">All Types</option>
                                <option value="Orthopedic">Orthopedic</option>
                                <option value="General Surgery">General Surgery</option>
                                <option value="ICU">ICU</option>
                                <option value="Pediatric">Pediatric</option>
                                <option value="Maternity">Maternity</option>
                                <option value="Cardiology">Cardiology</option>
                                <option value="Neurology">Neurology</option>
                                <option value="Oncology">Oncology</option>
                                <option value="Emergency Observation">Emergency Observation</option>
                                <option value="Recovery">Recovery</option>
                                <option value="Psychiatric">Psychiatric</option>
                                <option value="Rehabilitation">Rehabilitation</option>
                                <option value="Dermatology">Dermatology</option>
                                <option value="Isolation">Isolation</option>
                                <option value="Burn Unit">Burn Unit</option>
                                <option value="Pulmonology">Pulmonology</option>
                                <option value="Geriatrics">Geriatrics</option>
                                <option value="Palliative Care">Palliative Care</option>
                            </select>
                        </div>
                        <div>
                            <label for="occupancyFilter" class="block text-sm font-medium text-gray-700 mb-1">Occupancy:</label>
                            <select id="occupancyFilter" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="">All</option>
                                <option value="Available">Available Beds</option>
                                <option value="Full">Full</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200" id="wardsTable">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ward No.</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ward Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Beds</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Occupied Beds</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Available Beds</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Extn. No.</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Orthopedic</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">E Block</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">20</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">8</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Extn. 7711</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-2">View Patients</button>
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-2">✏️</button>
                                    <button class="text-red-600 hover:text-red-900">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">General Surgery</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">A Block</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">20</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">20</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">0</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Extn. 7712</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-2">View Patients</button>
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-2">✏️</button>
                                    <button class="text-red-600 hover:text-red-900">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Pediatric</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">C Block</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">20</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">8</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Extn. 7713</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-2">View Patients</button>
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-2">✏️</button>
                                    <button class="text-red-600 hover:text-red-900">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">4</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Cardiology</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">B Block</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">20</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">20</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">0</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Extn. 7714</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-2">View Patients</button>
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-2">✏️</button>
                                    <button class="text-red-600 hover:text-red-900">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">5</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Neurology</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">D Block</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">7</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">3</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Extn. 7715</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-2">View Patients</button>
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-2">✏️</button>
                                    <button class="text-red-600 hover:text-red-900">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">6</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Oncology</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">E Block</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">0</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Extn. 7716</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-2">View Patients</button>
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-2">✏️</button>
                                    <button class="text-red-600 hover:text-red-900">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">7</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Maternity</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">A Block</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">5</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Extn. 7717</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-2">View Patients</button>
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-2">✏️</button>
                                    <button class="text-red-600 hover:text-red-900">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">8</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Emergency Observation</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Main Building</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">13</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">2</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Extn. 7718</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-2">View Patients</button>
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-2">✏️</button>
                                    <button class="text-red-600 hover:text-red-900">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">9</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Recovery</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">B Block</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">0</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Extn. 7719</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-2">View Patients</button>
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-2">✏️</button>
                                    <button class="text-red-600 hover:text-red-900">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">10</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Psychiatric</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">D Block</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">6</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">4</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Extn. 7720</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-2">View Patients</button>
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-2">✏️</button>
                                    <button class="text-red-600 hover:text-red-900">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">11</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rehabilitation</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">C Block</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">11</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">4</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Extn. 7721</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-2">View Patients</button>
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-2">✏️</button>
                                    <button class="text-red-600 hover:text-red-900">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">12</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Dermatology</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">E Block</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">5</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">5</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Extn. 7722</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-2">View Patients</button>
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-2">✏️</button>
                                    <button class="text-red-600 hover:text-red-900">🗑️</button>
                                </td>
                            </tr>
                             <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">13</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Isolation</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">A Block</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">7</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Extn. 7723</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-2">View Patients</button>
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-2">✏️</button>
                                    <button class="text-red-600 hover:text-red-900">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">14</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Burn Unit</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Main Building</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">0</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Extn. 7724</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-2">View Patients</button>
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-2">✏️</button>
                                    <button class="text-red-600 hover:text-red-900">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">15</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Pulmonology</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">B Block</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">9</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">6</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Extn. 7725</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900 mr-2">View Patients</button>
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-2">✏️</button>
                                    <button class="text-red-600 hover:text-red-900">🗑️</button>
                                </td>
                            </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarIconContainer = document.getElementById('sidebar-icon-container');
        const mainContent = document.getElementById('main-content-area');
        const wardTypeFilter = document.getElementById('wardTypeFilter');
        const occupancyFilter = document.getElementById('occupancyFilter');
        const searchInput = document.getElementById('searchInput');
        const wardsTable = document.getElementById('wardsTable').getElementsByTagName('tbody')[0];
        const rows = wardsTable.getElementsByTagName('tr');

        const openIcon = `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>`;
        const closeIcon = `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>`;

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            if (sidebar.classList.contains('collapsed')) {
                 sidebarIconContainer.innerHTML = openIcon;
                 sidebar.querySelector('.text-2xl').innerHTML = 'H';
                 sidebar.querySelectorAll('nav ul li a').forEach(a => a.querySelector('svg').style.marginRight = '0');
                 sidebar.querySelectorAll('nav ul li a span, .mt-auto a span').forEach(s => s.style.display = 'none');
            } else {
                 sidebarIconContainer.innerHTML = closeIcon;
                 sidebar.querySelector('.text-2xl').innerHTML = 'Hospital HMS';
                 sidebar.querySelectorAll('nav ul li a').forEach(a => a.querySelector('svg').style.marginRight = '0.75rem'); // Restore original margin
                 sidebar.querySelectorAll('nav ul li a span, .mt-auto a span').forEach(s => s.style.display = 'inline');
            }
        });
        // Set initial icon
        sidebarIconContainer.innerHTML = closeIcon;


        function filterTable() {
            const wardType = wardTypeFilter.value.toLowerCase();
            const occupancy = occupancyFilter.value.toLowerCase();
            const searchText = searchInput.value.toLowerCase();

            for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                const wardName = cells[1].textContent.toLowerCase();
                const availableBeds = parseInt(cells[5].textContent);
                const wardNo = cells[0].textContent.toLowerCase();
                const location = cells[2].textContent.toLowerCase();
                const rowText = rows[i].textContent.toLowerCase();

                const wardTypeMatch = (wardType === "") || (wardName === wardType);
                let occupancyMatch = true;
                if (occupancy === "available") {
                    occupancyMatch = availableBeds > 0;
                } else if (occupancy === "full") {
                    occupancyMatch = availableBeds === 0;
                }
                const searchMatch = rowText.includes(searchText);

                if (wardTypeMatch && occupancyMatch && searchMatch) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }

        wardTypeFilter.addEventListener('change', filterTable);
        occupancyFilter.addEventListener('change', filterTable);
        searchInput.addEventListener('input', filterTable);

        // Initial filter call
        filterTable();

    </script>
</body>
</html>