<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 80);
            $table->string('last_name', 80);
            $table->string('email', 160)->index();
            $table->string('phone', 40)->nullable();

            // Not a foreign key — may be the literal 'unsure', which is a
            // valid answer to "which program?" in the admissions form.
            $table->string('program_slug', 64)->index();

            $table->enum('experience', ['none', 'some', 'a_lot'])->nullable();
            $table->text('why');

            $table->enum('status', [
                'received', 'reviewing', 'interview', 'accepted', 'declined',
            ])->default('received');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
