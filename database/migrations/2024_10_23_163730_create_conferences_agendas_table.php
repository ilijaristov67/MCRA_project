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
        Schema::create('conferences_agendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conference_day_id')->constrained('conferences_days')->onDelete('cascade');
            $table->string('title');
            $table->text('content')->nullable();
            $table->time('time');
            $table->foreignId('speaker_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conferences_agendas');
    }
};
