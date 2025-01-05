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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('email')->unique();
            $table->string('birthday')->nullable();
            $table->string('slug')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('bio')->nullable();
            $table->bigInteger('post_count')->default(0);
            $table->bigInteger('follower_count')->default(0);
            $table->bigInteger('following_count')->default(0);
            $table->bigInteger('task_done')->default(0);
            $table->bigInteger('project_done')->default(0);
            $table->text('x')->nullable();
            $table->text('github')->nullable();
            $table->text('img_bg')->nullable();
            $table->text('img')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('admin')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
