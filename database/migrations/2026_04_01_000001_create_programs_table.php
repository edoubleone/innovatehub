<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 64)->unique();
            $table->string('num', 4);          // "01".."06"
            $table->string('glyph', 4);        // "W", "D", ...
            $table->string('title', 160);
            $table->string('short', 240);
            $table->text('long');
            $table->string('duration', 60);
            $table->string('format', 80);
            $table->string('cohort', 40);
            $table->json('skills');            // ["JavaScript", "React", ...]
            $table->string('color', 16)->default('#1D4ED8');
            $table->string('image', 512);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index('sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
