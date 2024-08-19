<?php

use App\Models\Review;
use App\Models\User;
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
        Schema::create('review_like_dislikes', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Review::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            // dislike: 0 | like: 1
            $table->integer('index');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cmt_like_dislike');
    }
};
