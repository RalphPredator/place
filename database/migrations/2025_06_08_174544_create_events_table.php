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
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name', 125);
            $table->string('resume', 255);
            $table->text('description');
            $table->string('locate', 255);
            $table->datetime('date');
            $table->string('type', 25);
            $table->timestamps();
            $table->softDeletes();

            $table->foreignUuid('user_id');
            $table->foreignUuid('category_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
