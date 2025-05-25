<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Staff</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

<div class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white p-8 rounded-lg shadow-xl">
        <h1 class="text-3xl font-extrabold text-gray-800 mb-8 text-center">Edit Staff Member Details</h1>

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

        <form action="{{ route('staff.update', $staff->staff_id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="first_name" class="block text-gray-700 font-semibold text-sm mb-1">
                        First Name <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="first_name"
                        name="first_name"
                        value="{{ old('first_name', $staff->first_name) }}"
                        class="w-full border-gray-300 rounded-md p-2"
                        required
                    />
                </div>

                <div>
                    <label for="last_name" class="block text-gray-700 font-semibold text-sm mb-1">
                        Last Name <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="last_name"
                        name="last_name"
                        value="{{ old('last_name', $staff->last_name) }}"
                        class="w-full border-gray-300 rounded-md p-2"
                        required
                    />
                </div>

                <div>
                    <label for="date_of_birth" class="block text-gray-700 font-semibold text-sm mb-1">
                        Date of Birth <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="date"
                        id="date_of_birth"
                        name="date_of_birth"
                        value="{{ old('date_of_birth', $staff->date_of_birth) }}"
                        class="w-full border-gray-300 rounded-md p-2"
                        required
                    />
                </div>

                <div>
                    <label for="gender" class="block text-gray-700 font-semibold text-sm mb-1">
                        Gender <span class="text-red-500">*</span>
                    </label>
                    <select
                        id="gender"
                        name="gender"
                        class="w-full border-gray-300 rounded-md p-2"
                        required
                    >
                        <option value="">Select...</option>
                        <option value="Male" {{ old('gender', $staff->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender', $staff->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('gender', $staff->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div>
                    <label for="national_id" class="block text-gray-700 font-semibold text-sm mb-1">National ID</label>
                    <input
                        type="text"
                        id="national_id"
                        name="national_id"
                        value="{{ old('national_id', $staff->national_id) }}"
                        class="w-full border-gray-300 rounded-md p-2"
                    />
                </div>

                <div>
                    <label for="contact_email" class="block text-gray-700 font-semibold text-sm mb-1">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="email"
                        id="contact_email"
                        name="contact_email"
                        value="{{ old('contact_email', $staff->contact_email) }}"
                        class="w-full border-gray-300 rounded-md p-2"
                        required
                    />
                </div>

                <div>
                    <label for="phone_number" class="block text-gray-700 font-semibold text-sm mb-1">Phone Number</label>
                    <input
                        type="text"
                        id="phone_number"
                        name="phone_number"
                        value="{{ old('phone_number', $staff->phone_number) }}"
                        class="w-full border-gray-300 rounded-md p-2"
                    />
                </div>

                <div>
                    <label for="address" class="block text-gray-700 font-semibold text-sm mb-1">Address</label>
                    <input
                        type="text"
                        id="address"
                        name="address"
                        value="{{ old('address', $staff->address) }}"
                        class="w-full border-gray-300 rounded-md p-2"
                    />
                </div>

                <div>
                    <label for="job_title" class="block text-gray-700 font-semibold text-sm mb-1">
                        Job Title <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="job_title"
                        name="job_title"
                        value="{{ old('job_title', $staff->job_title) }}"
                        class="w-full border-gray-300 rounded-md p-2"
                        required
                    />
                </div>

                <div>
                    <label for="department" class="block text-gray-700 font-semibold text-sm mb-1">Department</label>
                    <input
                        type="text"
                        id="department"
                        name="department"
                        value="{{ old('department', $staff->department) }}"
                        class="w-full border-gray-300 rounded-md p-2"
                    />
                </div>

                <div>
                    <label for="hire_date" class="block text-gray-700 font-semibold text-sm mb-1">
                        Hire Date <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="date"
                        id="hire_date"
                        name="hire_date"
                        value="{{ old('hire_date', $staff->hire_date) }}"
                        class="w-full border-gray-300 rounded-md p-2"
                        required
                    />
                </div>

                <div>
                    <label for="employment_type" class="block text-gray-700 font-semibold text-sm mb-1">
                        Employment Type <span class="text-red-500">*</span>
                    </label>
                    <select
                        id="employment_type"
                        name="employment_type"
                        class="w-full border-gray-300 rounded-md p-2"
                        required
                    >
                        <option value="">Select...</option>
                        <option value="Full-Time" {{ old('employment_type', $staff->employment_type) == 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                        <option value="Part-Time" {{ old('employment_type', $staff->employment_type) == 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                        <option value="Contract" {{ old('employment_type', $staff->employment_type) == 'Contract' ? 'selected' : '' }}>Contract</option>
                    </select>
                </div>

                <div>
                    <label for="status" class="block text-gray-700 font-semibold text-sm mb-1">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select
                        id="status"
                        name="status"
                        class="w-full border-gray-300 rounded-md p-2"
                        required
                    >
                        <option value="">Select...</option>
                        <option value="Active" {{ old('status', $staff->status) == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="On Leave" {{ old('status', $staff->status) == 'On Leave' ? 'selected' : '' }}>On Leave</option>
                        <option value="Inactive" {{ old('status', $staff->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>

            <!-- Added qualifications and previous work experience -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div>
                    <label for="qualifications" class="block text-gray-700 font-semibold text-sm mb-1">Qualifications</label>
                    <textarea
                        id="qualifications"
                        name="qualifications"
                        rows="4"
                        class="w-full border-gray-300 rounded-md p-2"
                    >{{ old('qualifications', $staff->qualifications) }}</textarea>
                </div>

                <div>
                    <label for="work_experience" class="block text-gray-700 font-semibold text-sm mb-1">Previous Work Experience</label>
                    <textarea
                        id="work_experience"
                        name="work_experience"
                        rows="4"
                        class="w-full border-gray-300 rounded-md p-2"
                    >{{ old('work_experience', $staff->work_experience) }}</textarea>
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-4">
                <a
                    href="{{ route('staff.index') }}"
                    class="px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
                >
                    Cancel
                </a>
                <button
                    type="submit"
                    class="px-6 py-3 text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700"
                >
                    Update Staff
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
