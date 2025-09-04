<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('contest', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->string('organizer', 255)->nullable();
            $table->date('deadline')->nullable();
            $table->string('registration_link', 255)->nullable();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')
                ->references('id')
                ->on('category')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('contest');
    }
};
