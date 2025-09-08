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
        Schema::create('courses', function (Blueprint $table) {
        $table->id();
        $table->string('name')->unique();
        $table->string('course_image')->nullable();
        $table->string('teacher_image')->nullable();
        $table->string('teacher_job')->nullable();
        $table->integer('lessons')->default(0); 
     $table->decimal('price', 8, 2)->default(0); 
         $table->unsignedBigInteger('category_id')->nullable();
        $table->foreign('category_id')->references('id')->on('category')
              ->onDelete('set null');

        
      
        $table->unsignedBigInteger('teacher_id'); // link to user (teacher)
        $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
        // $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('courses');
           Schema::table('courses', function (Blueprint $table) {
           $table->dropColumn(['course_image', 'teacher_image', 'teacher_job', 'lessons','price']);
           $table->dropForeign(['category_id']);
            $table->dropForeign(['teacher_id']);
            $table->dropColumn(['category_id', 'teacher_id']);
           });

    
    }
};
