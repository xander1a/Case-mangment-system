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
        Schema::create('legal_advices', function (Blueprint $table) {
    $table->id();
    $table->string('case_id');
    $table->string('legal_officer_id');
    $table->text('details'); // Advice description
    $table->timestamp('advised_at')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_advices');
    }
};
