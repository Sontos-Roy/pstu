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
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('google_scholar')->nullable()->after('facebook');
            $table->string('research_gate')->nullable()->after('facebook');
            $table->string('scopus')->nullable()->after('facebook');
            $table->string('cv')->nullable()->after('facebook');
            $table->dropColumn('google_plus');
            $table->string('instagram')->nullable()->after('facebook');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            //
        });
    }
};
