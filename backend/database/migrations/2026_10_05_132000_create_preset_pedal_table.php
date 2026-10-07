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
        Schema::create('preset_pedal', function (Blueprint $table) {
            $table->foreignId('preset_id')->constrained()->cascadeOnDelete();
            $table->foreignId('pedal_id')->constrained()->cascadeOnDelete();
            $table->text('settings_note')->nullable();
            $table->primary(['preset_id', 'pedal_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preset_pedal');
    }
};
