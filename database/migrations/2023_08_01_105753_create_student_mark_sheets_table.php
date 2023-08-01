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
        Schema::create('student_mark_sheets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('student_id')->nullable();
            $table->string('program')->nullable();
            $table->string('year')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('document')->nullable();
            $table->string('document_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_mark_sheets');
    }
};
