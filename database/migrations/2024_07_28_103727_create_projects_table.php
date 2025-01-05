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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('des')->nullable();
            $table->text('text');
            $table->tinyInteger('type')->default(0);
            $table->integer('requests')->default(0);
            $table->integer('min')->default(0);
            $table->integer('max')->default(0);
            $table->string('slug')->uniqid();
            $table->tinyInteger('status')->default(0);
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade')->nullable(); 
            $table->foreignId('company_id')->constrained('companies')->onUpdate('cascade')->onDelete('cascade'); 
            $table->foreignId('salary_id')->constrained('salaries')->onUpdate('cascade')->onDelete('cascade'); 
            $table->foreignId('category_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
