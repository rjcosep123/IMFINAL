<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hospital_staff', function (Blueprint $table) {
            $table->id('staff_id'); // Auto-incrementing primary key
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('national_id')->unique()->nullable();
            $table->string('contact_email')->unique();
            $table->string('phone_number')->nullable();
            $table->text('address')->nullable();
            $table->string('job_title')->nullable();
            $table->string('department')->nullable();
            $table->date('hire_date')->nullable();
            $table->string('employment_type')->nullable(); // e.g., Full-time, Part-time
            $table->string('status')->default('Active'); // Active, On Leave, Resigned
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_staff');
    }
};
