<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use Illuminate\Http\Request;

class WardController extends Controller
{
    public function index(Request $request)
    {
        $query = Ward::query();

        // Filter by ward_type if sent in request
        if ($request->filled('ward_type')) {
            $query->where('ward_type', $request->ward_type);
        }

        // Search by ward_name if sent
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('ward_name', 'like', "%$search%");
        }

        // Filter by occupancy status if sent
        if ($request->filled('occupancy')) {
            if ($request->occupancy === 'full') {
                $query->whereColumn('occupied_beds', '>=', 'total_beds');
            } elseif ($request->occupancy === 'partial') {
                $query->whereColumn('occupied_beds', '<', 'total_beds')
                      ->where('occupied_beds', '>', 0);
            } elseif ($request->occupancy === 'empty') {
                $query->where('occupied_beds', 0);
            }
        }

        $wards = $query->get();

        $wardTypes = [
            'Orthopedic', 'General Surgery', 'ICU', 'Pediatric', 'Maternity',
            'Cardiology', 'Neurology', 'Oncology', 'Emergency Observation',
            'Recovery', 'Psychiatric', 'Rehabilitation', 'Dermatology',
            'Isolation', 'Burn Unit', 'Pulmonology', 'Geriatrics', 'Palliative Care'
        ];

        return view('wards.wards', compact('wards', 'wardTypes'));
    }

    public function create()
    {
        $wards = Ward::all(); // fetch all wards if needed in the form view
        return view('wards.create', compact('wards'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'ward_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'total_beds' => 'required|integer|min:1',
            'occupied_beds' => 'required|integer|min:0',
        ]);

        Ward::create($request->all());

        return redirect()->route('wards.index')->with('success', 'Ward added successfully.');
    }

    public function edit(Ward $ward)
    {
        return view('wards.edit', compact('ward'));
    }

    public function update(Request $request, Ward $ward)
    {
        $request->validate([
            'ward_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'total_beds' => 'required|integer|min:1',
            'occupied_beds' => 'required|integer|min:0',
        ]);

        $ward->update($request->all());

        return redirect()->route('wards.index')->with('success', 'Ward updated successfully.');
    }

    public function destroy(Ward $ward)
    {
        $ward->delete();

        return redirect()->route('wards.index')->with('success', 'Ward deleted successfully.');
    }
    
}
