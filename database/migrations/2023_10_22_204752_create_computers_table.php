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
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('so', 100);
            $table->string('ofimatica', 100);
            $table->string('cpu', 100);
            $table->string('storage', 100);
            $table->string('ram', 100);
            $table->string('ip', 100)->unique();
            $table->string('mac', 100);
            $table->string('serial', 100);
            $table->string('fixed_asset', 100);
            $table->string('anydesk', 100);
            $table->string('printer', 100);
            $table->string('scanner', 100);
            // Relacion de la tabla computadores con la tabla depenedecias.
            $table->foreignId('dependencies_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
