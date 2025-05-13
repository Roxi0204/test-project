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
        Schema::create('ciclo_formativos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('level')->nullable();
            $table->string('description')->nullable();
            $table->string('profesionalfamily')->nullable();
            $table->string('valuation')->nullable();
            $table->string('personalopinion')->nullable();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('ciclos_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciclo_formativos');
    }
};
