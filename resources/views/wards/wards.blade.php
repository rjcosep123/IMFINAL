<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Wards Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
        tbody tr.cursor-pointer:hover {
            background-color: #e0e7ff;
            cursor: pointer;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

<header class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-3xl font-semibold text-gray-800">Wards Management</h1>
    <a href="{{ route('wards.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
        + Add New Ward
    </a>
</header>

<main class="flex-grow container mx-auto p-6">

    <!-- Wards Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Ward No.</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Ward Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Location</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Beds (Occupied / Total)</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Occupancy Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Extension</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($wards as $ward)
                    <tr class="hover:bg-indigo-50 cursor-pointer" onclick="window.location='{{ route('wards.edit', $ward) }}'">
                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800">{{ $ward->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $ward->ward_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $ward->location }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $ward->occupied_beds }} / {{ $ward->total_beds }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($ward->occupied_beds >= $ward->total_beds)
                                <span class="text-red-600 font-semibold">Full</span>
                            @elseif($ward->occupied_beds > 0)
                                <span class="text-yellow-600 font-semibold">Partial</span>
                            @else
                                <span class="text-green-600 font-semibold">Empty</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $ward->extension_number }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <a href="{{ route('wards.edit', $ward) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                            <form method="POST" action="{{ route('wards.destroy', $ward) }}" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this ward?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">No wards found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>

</body>
</html>
