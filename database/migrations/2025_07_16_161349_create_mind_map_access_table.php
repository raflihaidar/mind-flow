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
        Schema::create('mind_map_access', function (Blueprint $table) {
            $table->uuid('id')->primary();;
            $table->uuid('mind_map_id');
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->enum('role', ['owner', 'editor', 'viewer']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mind_map_access');
    }
};
