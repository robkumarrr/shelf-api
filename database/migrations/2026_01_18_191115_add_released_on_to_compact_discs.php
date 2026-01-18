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
        Schema::table('compact_discs', function (Blueprint $table) {
            $table->date('released_on')->after('number_of_songs')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compact_discs', function (Blueprint $table) {
            $table->dropColumn('released_on');
        });
    }
};
