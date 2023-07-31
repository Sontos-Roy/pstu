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
        Schema::create('user_research_supervisions', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('user_id');
            $table->smallInteger('created_by');
            
            $table->string('level_of_study');
            $table->string('title')->nullable();
            $table->string('supervisor')->nullable();
            $table->string('co_supervisor')->nullable();
            $table->string('no_of_student')->nullable();
            $table->string('area_research')->nullable();
            $table->string('current_completion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_research_supervisions');
    }
};
