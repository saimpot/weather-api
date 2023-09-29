<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('weather_data', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('weather_data_type_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('value');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather_data');
    }
};
