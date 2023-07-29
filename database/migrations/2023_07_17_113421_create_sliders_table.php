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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string("head")->nullable();
            $table->string("first_btn")->nullable();
            $table->string("second_btn")->nullable();
            $table->text("first_btn_link")->nullable();
            $table->text("second_btn_link")->nullable();
            $table->boolean("isActive")->nullable();
            $table->text("image")->nullable();
            $table->string("select_for")->nullable();
            $table->foreignId("faculty_id")->nullable();
            $table->foreignId("department_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
