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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
                        $table->string('title');
            $table->text('content');

            // Foreign key to admins
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')
                  ->references('id')->on('admins')
                  ->onDelete('cascade');
               // Store image path (relative or full URL)
            $table->string('image')->nullable();

            // Foreign key to categories
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                  ->references('id')->on('categories')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
