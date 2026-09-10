<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->text('quote');
            $table->string('name', 120);
            $table->string('role', 160);
            $table->char('avatar_initial', 1);
            $table->string('avatar_class', 32)->default('avatar-1');
            $table->boolean('published')->default(true);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['published', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
