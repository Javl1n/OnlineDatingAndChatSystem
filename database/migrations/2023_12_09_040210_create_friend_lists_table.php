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
        Schema::create('friend_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_id')->constrained(
                table: 'users', indexName:'from_id',
            )->onDelete('cascade');
            $table->foreignId('to_id')->constrained(
                table: 'users', indexName:'to_id',
            )->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friend_lists');
    }
};
