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
        Schema::create('project_skills', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status')->default(1);
            $table->foreignId('skill_id')->constrained('skills')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_skills');
    }
};
