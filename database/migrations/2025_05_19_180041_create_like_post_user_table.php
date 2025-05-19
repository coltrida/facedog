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
        Schema::create('like_post_user', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Post::class);
            $table->foreignIdFor(\App\Models\User::class);
            $table->char('likeUnlike');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like_post_user');
    }
};
