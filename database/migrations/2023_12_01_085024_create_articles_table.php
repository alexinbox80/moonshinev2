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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')
                ->nullable()
                ->constrained('moonshine_users')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->string('title');
            $table->text('description');
            $table->text('thumbnail')->nullable();
            $table->string('slug')->nullable();

            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->integer('rating')->default(0);
            $table->integer('age_from')->default(0);
            $table->integer('age_to')->default(60);
            $table->boolean('active')->default(true);
            $table->string('link')->nullable();
            $table->string('color')->nullable();
            $table->text('files')->nullable();
            $table->text('code')->nullable();
            $table->json('data')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
