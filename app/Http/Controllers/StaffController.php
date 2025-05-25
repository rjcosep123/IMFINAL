<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index()
    {
        $staff = DB::table('hospital_staff')->get();

        $staff = $staff->map(function ($s) {
            $s->name = $s->first_name . ' ' . $s->last_name;
            $s->role = $s->job_title;
            return $s;
        });

        return view('staffmanagement', compact('staff'));
    }

    public function create()
    {
        return view('addstaff');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'      => 'required|string|max:100',
            'last_name'       => 'required|string|max:100',
            'date_of_birth'   => 'required|date',
            'gender'          => 'required|string',
            'national_id'     => 'nullable|string|max:50',
            'contact_email'   => 'required|email|max:100',
            'phone_number'    => 'nullable|string|max:20',
            'address'         => 'nullable|string|max:255',
            'job_title'       => 'required|string|max:100',
            'department'      => 'nullable|string|max:100',
            'hire_date'       => 'required|date',
            'employment_type' => 'required|string',
            'status'          => 'required|string',
            'qualifications'  => 'nullable|string',
            'work_experience'=> 'nullable|string',
        ]);

        DB::table('hospital_staff')->insert([
            'first_name'      => $validated['first_name'],
            'last_name'       => $validated['last_name'],
            'date_of_birth'   => $validated['date_of_birth'],
            'gender'          => $validated['gender'],
            'national_id'     => $validated['national_id'],
            'contact_email'   => $validated['contact_email'],
            'phone_number'    => $validated['phone_number'],
            'address'         => $validated['address'],
            'job_title'       => $validated['job_title'],
            'department'      => $validated['department'],
            'hire_date'       => $validated['hire_date'],
            'employment_type' => $validated['employment_type'],
            'status'          => $validated['status'],
            'qualifications'  => $validated['qualifications'] ?? null,
            'work_experience'=> $validated['work_experience'] ?? null,
            'created_at'      => now(),
            'updated_at'      => now(),
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff created successfully!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name'      => 'required|string|max:100',
            'last_name'       => 'required|string|max:100',
            'date_of_birth'   => 'required|date',
            'gender'          => 'required|string',
            'national_id'     => 'nullable|string|max:50',
            'contact_email'   => 'required|email|max:100',
            'phone_number'    => 'nullable|string|max:20',
            'address'         => 'nullable|string|max:255',
            'job_title'       => 'required|string|max:100',
            'department'      => 'nullable|string|max:100',
            'hire_date'       => 'required|date',
            'employment_type' => 'required|string',
            'status'          => 'required|string',
            'qualifications'  => 'nullable|string',
            'work_experience'=> 'nullable|string',
        ]);
    
        DB::table('hospital_staff')
            ->where('staff_id', $id)
            ->update([
                'first_name'      => $validated['first_name'],
                'last_name'       => $validated['last_name'],
                'date_of_birth'   => $validated['date_of_birth'],
                'gender'          => $validated['gender'],
                'national_id'     => $validated['national_id'],
                'contact_email'   => $validated['contact_email'],
                'phone_number'    => $validated['phone_number'],
                'address'         => $validated['address'],
                'job_title'       => $validated['job_title'],
                'department'      => $validated['department'],
                'hire_date'       => $validated['hire_date'],
                'employment_type' => $validated['employment_type'],
                'status'          => $validated['status'],
                'qualifications'  => $validated['qualifications'] ?? null,
                'work_experience'=> $validated['work_experience'] ?? null,
                'updated_at'      => now(),
            ]);
    
        return redirect()->route('staff.index')->with('success', 'Staff updated successfully!');
    }

    public function destroy($id)
    {
        DB::table('hospital_staff')->where('staff_id', $id)->delete();
        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully!');
    }

    public function edit($id)
    {
        $staff = DB::table('hospital_staff')->where('staff_id', $id)->first();
    
        if (!$staff) {
            return redirect()->route('staff.index')->withErrors('Staff member not found.');
        }
    
        return view('editstaff', compact('staff'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = collect();

        if ($query) {
            $results = collect(DB::select('SELECT * FROM search_staff(?)', [$query]));
        }

        return view('search', compact('results'));
    }
}
