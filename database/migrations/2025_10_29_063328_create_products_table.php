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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productname');
            $table->string('productid')->unique();
            $table->string('slug')->unique();
            $table->foreignId('category_id')
                ->constrained('categories') // Menyebutkan nama tabel secara eksplisit
                ->onDelete('cascade');
            $table->text('description');
            $table->json('gambar')->nullable();
            $table->json('thumbnail')->nullable();
            $table->json('url')->nullable();
            $table->enum('status', ['Inactive', 'Active']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
