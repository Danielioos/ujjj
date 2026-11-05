<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('oprendszer', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->string('nev', 100)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('oprendszer');
    }
};
