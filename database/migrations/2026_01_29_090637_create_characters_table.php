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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password'); 
            $table->integer('level')->default(1);
            $table->integer('base_health')->default(100);
            $table->integer('base_damage')->default(10);
            $table->integer('money')->default(0);
        
            $table->foreignId('hat')->nullable()->constrained('items')->onDelete('set null');
            $table->foreignId('shirt')->nullable()->constrained('items')->onDelete('set null');
            $table->foreignId('pants')->nullable()->constrained('items')->onDelete('set null');
            $table->foreignId('shoes')->nullable()->constrained('items')->onDelete('set null');
            $table->foreignId('weapon')->nullable()->constrained('items')->onDelete('set null');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
