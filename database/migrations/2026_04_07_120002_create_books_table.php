<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('edition');
            $table->unsignedSmallInteger('copyright');
            $table->string('language');
            $table->unsignedInteger('pages');
            $table->foreignId('author_id')->constrained()->restrictOnDelete();
            $table->foreignId('publisher_id')->constrained()->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
