<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen font-sans antialiased">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center">Find Staff by Expertise</h1>

        <form method="GET" action="{{ route('staff.search') }}" class="mb-10 p-6 bg-white rounded-lg shadow-md">
            <div class="flex flex-col md:flex-row items-center gap-5">
                <div class="flex-grow w-full">
                    <label for="query" class="sr-only">Search by qualifications or work history</label>
                    <input
                        type="text"
                        name="query"
                        id="query"
                        value="{{ request('query') }}"
                        placeholder="e.g., 'Project Management', 'JavaScript', 'Nurse practitioner'"
                        class="w-full px-5 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-gray-800 placeholder-gray-400 text-base"
                    >
                </div>
                <button
                    type="submit"
                    class="w-full md:w-auto px-8 py-3 bg-indigo-700 text-white font-bold rounded-lg hover:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150 text-base"
                >
                    Search Staff
                </button>
            </div>
        </form>

        @if(isset($results) && $results->count())
            <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Staff ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Position</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Qualifications</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Work Experience</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($results as $staff)
                                <tr class="hover:bg-indigo-50 transition ease-in-out duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $staff->staff_id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $staff->first_name }} {{ $staff->last_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $staff->job_title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $staff->contact_email }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $staff->qualifications }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $staff->work_experience }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @elseif(request()->has('query'))
            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <p class="text-lg text-gray-600">No staff found matching "{{ request('query') }}". Please try a different search term.</p>
            </div>
        @else
            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <p class="text-lg text-gray-600">Enter qualifications or work history in the search bar above to find relevant staff members.</p>
            </div>
        @endif
    </div>
</body>
</html>