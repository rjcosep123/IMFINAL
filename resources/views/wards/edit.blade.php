<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')
@section('content')
<div class="min-h-screen bg-gray-100 flex flex-col">
    <header class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-800">Edit Ward</h1>
        <a href="{{ route('wards.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">← Back to Wards</a>
    </header>

    <main class="flex-1 p-6">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-6">
            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('wards.update', $ward->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-700">Ward Name</label>
                    <input type="text" name="ward_name" value="{{ old('ward_name', $ward->ward_name) }}" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-200" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" name="location" value="{{ old('location', $ward->location) }}" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-200" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Total Beds</label>
                    <input type="number" name="total_beds" value="{{ old('total_beds', $ward->total_beds) }}" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-200" min="1" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Occupied Beds</label>
                    <input type="number" name="occupied_beds" value="{{ old('occupied_beds', $ward->occupied_beds) }}" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-200" min="0" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Extension Number</label>
                    <input type="text" name="extension_number" value="{{ old('extension_number', $ward->extension_number) }}" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-200">
                </div>

                <div class="flex justify-end space-x-4 mt-6">
                    <a href="{{ route('wards.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">Cancel</a>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Ward</button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection


    
</body>
</html>