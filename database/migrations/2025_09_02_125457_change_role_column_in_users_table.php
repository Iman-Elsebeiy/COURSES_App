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
        Schema::table('users', function (Blueprint $table) {
            //


       
            // Drop the old enum column
            $table->dropColumn('role');

            // Add the new string column
            $table->string('role')->default('student');
        });
    
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
             // Revert back if needed
            $table->dropColumn('role');
            $table->enum('role', ['teacher', 'student'])->default('student');
        });
    }
};
