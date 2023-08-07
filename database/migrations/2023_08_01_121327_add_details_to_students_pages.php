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
        Schema::table('students_pages', function (Blueprint $table) {
            $table->text('details')->nullable();
            $table->string('menu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students_pages', function (Blueprint $table) {
            $table->dropColumn('details');
            $table->dropColumn('menu');
        });
    }
};
