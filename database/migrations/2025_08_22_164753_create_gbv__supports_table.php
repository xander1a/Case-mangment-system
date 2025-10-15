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
       Schema::create('gbv_supports', function (Blueprint $table) {
    $table->id();
    $table->string('case_id');
    $table->string('gbv_officer_id');
    $table->text('provided_items'); // e.g., food, clothes
    $table->timestamp('supported_at')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gbv_supports');
    }
};
