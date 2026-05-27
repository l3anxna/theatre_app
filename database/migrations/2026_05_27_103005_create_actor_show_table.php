<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('actor_show', function (Blueprint $table) {
            $table->id();

            $table->foreignId('actor_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('show_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('character_name')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('actor_show');
    }
};