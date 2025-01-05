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
        Schema::create('job_offer_requests', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('salary')->default(0);
            $table->text('des');
            $table->string('reject')->nullable();
            $table->text('resolve')->nullable();
            $table->foreignId('job_offer_id')->constrained('job_offers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('reject_id')->nullable()->constrained('rejects')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_offer_requests');
    }
};
