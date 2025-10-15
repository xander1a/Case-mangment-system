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
        Schema::create('reports', function (Blueprint $table) {
    $table->id();
    $table->string('case_id');
    $table->string('submitter_id')->nullable(); // Specialist who submitted
    $table->string('type'); // e.g., 'medical', 'psychological', 'legal', 'gbv', 'social'
    $table->text('content');
    $table->string('submitted_via')->default('email'); // Simulate Email/Outlook
    $table->timestamp('submitted_at')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
