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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('des');
            $table->text('img');
            $table->text('img_bg');
            $table->tinyInteger('founded');
            $table->tinyInteger('status');
            $table->string('industry');
            $table->tinyInteger('revenue');
            $table->string('type');
            $table->tinyInteger('sector');
            $table->tinyInteger('size');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
