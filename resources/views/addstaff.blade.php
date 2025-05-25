<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

<div class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white p-8 rounded-lg shadow-xl">
        <h1 class="text-3xl font-extrabold text-gray-800 mb-8 text-center">Add New Staff Member</h1>

        @if ($errors->any())
            <div class="mb-8 bg-red-100 text-red-700 p-5 rounded-lg border border-red-200">
                <h3 class="font-bold text-lg mb-3">Please correct the following errors:</h3>
                <ul class="list-disc pl-6 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('staff.store') }}" method="POST" class="space-y-6">
            @csrf

            <input type="hidden" name="staff_id">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="first_name" class="block text-gray-700 font-semibold text-sm mb-1">First Name <span class="text-red-500">*</span></label>
                    <input type="text" id="first_name" name="first_name" required class="w-full border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div>
                    <label for="last_name" class="block text-gray-700 font-semibold text-sm mb-1">Last Name <span class="text-red-500">*</span></label>
                    <input type="text" id="last_name" name="last_name" required class="w-full border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div>
                    <label for="date_of_birth" class="block text-gray-700 font-semibold text-sm mb-1">Date of Birth <span class="text-red-500">*</span></label>
                    <input type="date" id="date_of_birth" name="date_of_birth" required class="w-full border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div>
                    <label for="gender" class="block text-gray-700 font-semibold text-sm mb-1">Gender <span class="text-red-500">*</span></label>
                    <select id="gender" name="gender" required class="w-full border-gray-300 rounded-md shadow-sm p-2">
                        <option value="">Select...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div>
                    <label for="national_id" class="block text-gray-700 font-semibold text-sm mb-1">National ID</label>
                    <input type="text" id="national_id" name="national_id" class="w-full border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div>
                    <label for="contact_email" class="block text-gray-700 font-semibold text-sm mb-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" id="contact_email" name="contact_email" required class="w-full border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div>
                    <label for="phone_number" class="block text-gray-700 font-semibold text-sm mb-1">Phone Number</label>
                    <input type="text" id="phone_number" name="phone_number" class="w-full border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div>
                    <label for="address" class="block text-gray-700 font-semibold text-sm mb-1">Address</label>
                    <input type="text" id="address" name="address" class="w-full border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div>
                    <label for="job_title" class="block text-gray-700 font-semibold text-sm mb-1">Job Title <span class="text-red-500">*</span></label>
                    <input type="text" id="job_title" name="job_title" required class="w-full border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div>
                    <label for="department" class="block text-gray-700 font-semibold text-sm mb-1">Department</label>
                    <input type="text" id="department" name="department" class="w-full border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div>
                    <label for="hire_date" class="block text-gray-700 font-semibold text-sm mb-1">Hire Date <span class="text-red-500">*</span></label>
                    <input type="date" id="hire_date" name="hire_date" required class="w-full border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div>
                    <label for="employment_type" class="block text-gray-700 font-semibold text-sm mb-1">Employment Type <span class="text-red-500">*</span></label>
                    <select id="employment_type" name="employment_type" required class="w-full border-gray-300 rounded-md shadow-sm p-2">
                        <option value="">Select...</option>
                        <option value="Full-Time">Full-Time</option>
                        <option value="Part-Time">Part-Time</option>
                        <option value="Contract">Contract</option>
                    </select>
                </div>

                <div>
                    <label for="status" class="block text-gray-700 font-semibold text-sm mb-1">Status <span class="text-red-500">*</span></label>
                    <select id="status" name="status" required class="w-full border-gray-300 rounded-md shadow-sm p-2">
                        <option value="">Select...</option>
                        <option value="Active">Active</option>
                        <option value="On Leave">On Leave</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>

            <!-- ✅ Qualifications & Experience Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div>
                    <label for="qualifications" class="block text-gray-700 font-semibold text-sm mb-1">Qualifications</label>
                    <textarea id="qualifications" name="qualifications" rows="4" class="w-full border-gray-300 rounded-md shadow-sm p-2"></textarea>
                </div>

                <div>
                    <label for="work_experience" class="block text-gray-700 font-semibold text-sm mb-1">Previous Work Experience</label>
                    <textarea id="work_experience" name="work_experience" rows="4" class="w-full border-gray-300 rounded-md shadow-sm p-2"></textarea>
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('staff.index') }}" class="px-6 py-3 border border-gray-300 text-gray-700 bg-white rounded-md hover:bg-gray-50">Cancel</a>
                <button type="submit" class="px-6 py-3 text-white bg-blue-600 hover:bg-blue-700 rounded-md">Save Staff</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
