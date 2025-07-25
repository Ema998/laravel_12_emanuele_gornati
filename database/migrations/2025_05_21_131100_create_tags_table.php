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
       Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
            $table->foreign('article_id')->references('id')->on('articles');
            $table->unsignedBigInteger('article_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
