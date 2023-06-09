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
            $table->uuid('id')->primary();
            $table->string('media');
            $table->string('title');
            $table->text('caption');
            $table->string('prompt')->nullable();
            $table->string('collection_id')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->integer('quinx_count')->default(0);
            $table->integer('view')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
