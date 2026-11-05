<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gep', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gyarto', 8)->nullable();
            $table->string('tipus', 100)->nullable();
            $table->string('kijelzo', 8)->nullable();
            $table->integer('memoria')->nullable();
            $table->integer('merevlemez')->nullable();
            $table->string('videovezerlo', 100)->nullable();
            $table->integer('ar')->nullable();
            $table->unsignedInteger('processzorid')->nullable();
            $table->unsignedInteger('oprendszerid')->nullable();
            $table->integer('db')->default(0);
            $table->foreign('processzorid')->references('id')->on('processzor')->nullOnDelete();
            $table->foreign('oprendszerid')->references('id')->on('oprendszer')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gep');
    }
};
