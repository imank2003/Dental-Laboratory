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

        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->foreignId('service_id')->constrained();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description');
            $table->boolean('is_published')->default(false);
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
