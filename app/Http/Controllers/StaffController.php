<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class StaffController extends Controller
{
    public function index()
    {
        $staff = DB::table('hospital_staff')
            ->leftJoin('wards', 'hospital_staff.ward_id', '=', 'wards.id')
            ->select('hospital_staff.*', 'wards.ward_name')
            ->get();

        $staff = $staff->map(function ($s) {
            $s->name = $s->first_name . ' ' . $s->last_name;
            $s->role = $s->job_title;
            return $s;
        });

        return view('staffmanagement', compact('staff'));
    }

    public function create()
    {
        $wards = DB::table('wards')->select('id', 'ward_name')->get();
        return view('addstaff', compact('wards'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'      => 'required|string|max:100',
            'last_name'       => 'required|string|max:100',
            'date_of_birth'   => 'required|date',
            'gender'          => 'required|string',
            'national_id'     => 'nullable|string|max:50',
            'contact_email'   => 'required|email|max:100|unique:hospital_staff,contact_email',
            'phone_number'    => 'nullable|string|max:20',
            'address'         => 'nullable|string|max:255',
            'job_title'       => 'required|string|max:100',
            'department'      => 'nullable|string|max:100',
            'hire_date'       => 'required|date',
            'employment_type' => 'required|string',
            'status'          => 'required|string',
            'qualifications'  => 'nullable|string',
            'work_experience' => 'nullable|string',
            'ward_id'         => 'nullable|exists:wards,id',
        ]);

        try {
            DB::statement('CALL manage_hospital_staff(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
                $validated['first_name'],
                $validated['last_name'],
                $validated['date_of_birth'],
                $validated['gender'],
                $validated['national_id'],
                $validated['contact_email'],
                $validated['phone_number'],
                $validated['address'],
                $validated['job_title'],
                $validated['department'],
                $validated['hire_date'],
                $validated['employment_type'],
                $validated['status'],
                $validated['qualifications'] ?? null,
                $validated['work_experience'] ?? null,
                $validated['ward_id'] ?? null,
            ]);

            return redirect()->route('staff.index')->with('success', 'Staff created successfully!');
        } catch (QueryException $e) {
            Log::error('Error calling procedure manage_hospital_staff: ' . $e->getMessage());

            if ($e->getCode() === '23505') {
                if (str_contains($e->getMessage(), 'hospital_staff_contact_email_unique')) {
                    return redirect()->back()->withInput()->withErrors(['contact_email' => 'The email address is already in use.']);
                }

                return redirect()->back()->withInput()->withErrors(['error' => 'A record with the same unique value already exists.']);
            }

            return redirect()->back()->withInput()->withErrors(['error' => 'An unexpected error occurred while creating staff.']);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name'      => 'required|string|max:100',
            'last_name'       => 'required|string|max:100',
            'date_of_birth'   => 'required|date',
            'gender'          => 'required|string',
            'national_id'     => 'nullable|string|max:50',
            'contact_email'   => 'required|email|max:100|unique:hospital_staff,contact_email,' . $id . ',staff_id',
            'phone_number'    => 'nullable|string|max:20',
            'address'         => 'nullable|string|max:255',
            'job_title'       => 'required|string|max:100',
            'department'      => 'nullable|string|max:100',
            'hire_date'       => 'required|date',
            'employment_type' => 'required|string',
            'status'          => 'required|string',
            'qualifications'  => 'nullable|string',
            'work_experience' => 'nullable|string',
            'ward_id'         => 'nullable|exists:wards,id',
        ]);

        try {
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
                    'work_experience' => $validated['work_experience'] ?? null,
                    'ward_id'         => $validated['ward_id'] ?? null,
                    'updated_at'      => now(),
                ]);

            return redirect()->route('staff.index')->with('success', 'Staff updated successfully!');
        } catch (QueryException $e) {
            Log::error('Error updating staff member: ' . $e->getMessage());

            if ($e->getCode() === '23505') {
                if (str_contains($e->getMessage(), 'hospital_staff_contact_email_unique')) {
                    return redirect()->back()->withInput()->withErrors(['contact_email' => 'The email address is already in use.']);
                }

                return redirect()->back()->withInput()->withErrors(['error' => 'A record with the same unique value already exists.']);
            }

            return redirect()->back()->withInput()->withErrors(['error' => 'An unexpected error occurred while updating staff.']);
        }
    }

    public function destroy($id)
    {
        try {
            DB::table('hospital_staff')->where('staff_id', $id)->delete();
            return redirect()->route('staff.index')->with('success', 'Staff deleted successfully!');
        } catch (QueryException $e) {
            Log::error('Error deleting staff member: ' . $e->getMessage());
            return redirect()->route('staff.index')->withErrors(['error' => 'An error occurred while deleting the staff member.']);
        }
    }

    public function edit($id)
    {
        $staff = DB::table('hospital_staff')->where('staff_id', $id)->first();

        if (!$staff) {
            return redirect()->route('staff.index')->withErrors('Staff member not found.');
        }

        $wards = DB::table('wards')->select('id', 'ward_name')->get();

        return view('editstaff', compact('staff', 'wards'));
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
