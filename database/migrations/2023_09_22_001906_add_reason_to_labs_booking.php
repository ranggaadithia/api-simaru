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
        Schema::table('labs_booking', function (Blueprint $table) {
            $table->text('reason_to_booking')->after('end_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('labs_booking', function (Blueprint $table) {
            $table->dropColumn('reason_to_booking');
        });
    }
};
