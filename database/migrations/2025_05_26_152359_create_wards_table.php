<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWardsTable extends Migration
{
    public function up(): void
    {
        Schema::create('wards', function (Blueprint $table) {
            $table->id();
            $table->string('ward_name');
            $table->string('location');
            $table->integer('total_beds');
            $table->integer('occupied_beds')->default(0);
            $table->string('extension_number'); // Added
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wards');
    }
}
