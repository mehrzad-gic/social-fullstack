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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->integer('likes')->default(0);
            $table->string('slug')->uniqid()->nullable();
            $table->tinyInteger('status')->default(0);
            $table->bigInteger('commentable_id')->nullable();  
            $table->string('commentable_type')->nullable(); 
            $table->tinyInteger('deep')->default(0);
            $table->bigInteger('parent_id')->default(0);
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
