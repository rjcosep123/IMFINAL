@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Add New Staff</h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('staff.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">
            </div>

            <div>
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">
            </div>

            <div>
                <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">
            </div>

            <div>
                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                <select name="gender" id="gender" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">
                    <option value="">Select gender</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div>
                <label for="national_id" class="block text-sm font-medium text-gray-700">National ID</label>
                <input type="text" name="national_id" id="national_id" value="{{ old('national_id') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">
            </div>

            <div>
                <label for="contact_email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">
            </div>

            <div>
                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" name="address" id="address" value="{{ old('address') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">
            </div>

            <div>
                <label for="job_title" class="block text-sm font-medium text-gray-700">Job Title</label>
                <input type="text" name="job_title" id="job_title" value="{{ old('job_title') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">
            </div>

            <div>
                <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                <input type="text" name="department" id="department" value="{{ old('department') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">
            </div>

            <div>
                <label for="hire_date" class="block text-sm font-medium text-gray-700">Hire Date</label>
                <input type="date" name="hire_date" id="hire_date" value="{{ old('hire_date') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">
            </div>

            <div>
                <label for="employment_type" class="block text-sm font-medium text-gray-700">Employment Type</label>
                <select name="employment_type" id="employment_type" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">
                    <option value="">Select employment type</option>
                    <option value="Full-Time" {{ old('employment_type') == 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                    <option value="Part-Time" {{ old('employment_type') == 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                    <option value="Contract" {{ old('employment_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                    <option value="Temporary" {{ old('employment_type') == 'Temporary' ? 'selected' : '' }}>Temporary</option>
                    <option value="Intern" {{ old('employment_type') == 'Intern' ? 'selected' : '' }}>Intern</option>
                </select>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">
                    <option value="">Select status</option>
                    <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="On Leave" {{ old('status') == 'On Leave' ? 'selected' : '' }}>On Leave</option>
                    <option value="Suspended" {{ old('status') == 'Suspended' ? 'selected' : '' }}>Suspended</option>
                </select>
            </div>

            <div>
                <label for="ward_id" class="block text-sm font-medium text-gray-700">Ward Allocation</label>
                <select id="ward_id" name="ward_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">
                    <option value="">Select a ward...</option>
                    @foreach ($wards as $ward)
                        <option value="{{ $ward->id }}" {{ old('ward_id') == $ward->id ? 'selected' : '' }}>
                            {{ $ward->ward_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-2">
                <label for="qualifications" class="block text-sm font-medium text-gray-700">Qualifications</label>
                <textarea name="qualifications" id="qualifications" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">{{ old('qualifications') }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label for="work_experience" class="block text-sm font-medium text-gray-700">Work Experience</label>
                <textarea name="work_experience" id="work_experience" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2">{{ old('work_experience') }}</textarea>
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
                Save Staff
            </button>
        </div>
    </form>
</div>
@endsection
