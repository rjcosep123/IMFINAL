<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hospital_staff', function (Blueprint $table) {
            $table->text('qualifications')->nullable();
            $table->text('work_experience')->nullable();
            $table->string('allocation')->nullable(); // Add allocation column
        });
    }

    public function down(): void
    {
        Schema::table('hospital_staff', function (Blueprint $table) {
            $table->dropColumn(['qualifications', 'work_experience', 'allocation']);
        });
    }
};
