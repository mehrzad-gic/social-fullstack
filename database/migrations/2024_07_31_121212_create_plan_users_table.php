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
        Schema::create('plan_users', function (Blueprint $table) {
            $table->id();
            $table->integer('request');
            $table->integer('freeze')->default(0);
            $table->tinyInteger('status')->comment('1 => active');
            $table->tinyInteger('plan_type')->comment('0 => mount , 1 => year');
            $table->foreignId('plan_id')->constrained('plans')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('date_start');
            $table->integer('date_end')->comment('if end date > now : fail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_users');
    }
};
