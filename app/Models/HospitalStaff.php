<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalStaff extends Model
{
    protected $table = 'hospital_staff'; // Matches the table name

    protected $primaryKey = 'staff_id'; // Primary key column

    public $incrementing = true; // Auto-incrementing ID

    protected $keyType = 'int'; // ID is an integer

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'national_id',
        'contact_email',
        'phone_number',
        'address',
        'job_title',
        'department',
        'hire_date',
        'employment_type',
        'status',
    ];
    public function ward()
{
    return $this->belongsTo(Ward::class, 'ward_id');
}
}
