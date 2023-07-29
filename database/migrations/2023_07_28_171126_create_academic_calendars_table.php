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
        Schema::create('academic_calendars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('academic_year')->nullable();
            $table->smallInteger('created_by')->nullable();
            $table->smallInteger('faculty_id')->nullable();
            $table->smallInteger('department_id')->nullable();
            $table->date('class_start')->nullable();
            $table->date('first_mid_term')->nullable();
            $table->date('second_mid_term')->nullable();
            $table->date('class_completion')->nullable();
            $table->date('field_work')->nullable();
            $table->date('final_exam_start')->nullable();
            $table->date('final_exam_end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_calendars');
    }
};
