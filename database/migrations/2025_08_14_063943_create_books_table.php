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
        Schema::create('book', function (Blueprint $table) {
            $table->id('id_book');
            $table->foreignId('id_author')
                ->constrained('author', 'id_author')
                ->onDelete('cascade');

            $table->foreignId('id_category')
                ->constrained('category', 'id_category')
                ->onDelete('cascade');
            $table->string('book_title');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};