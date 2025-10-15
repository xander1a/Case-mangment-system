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

    Schema::create('victims', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('id_number')->nullable(); // National ID or passport number
    $table->string('id_image')->nullable(); // Path to ID image
    $table->string('phone')->nullable();
    $table->string('violence_type')->nullable();
    $table->text('address')->nullable();
    $table->text('other_details')->nullable(); // e.g., age, gender, incident description
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('victims');
    }
};
