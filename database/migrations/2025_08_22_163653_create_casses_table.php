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
    Schema::create('casses', function (Blueprint $table) {
    $table->id();
    $table->string('victim_id');
    $table->string('investigator_id');

     $table->enum('status', ['open', 'in_progress', 'reports_submitted', 'closed'])->default('open')->nullable(); // open, in_progress, reports_submitted
     $table->string('solver')->nullable();
     $table->string('solver_approved')->nullable()->default('pending');
    $table->timestamp('opened_at')->nullable();
    $table->timestamp('closed_at')->nullable();
    $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casses');
    }
};
