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
        Schema::create('academicclassables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('academicclass_id');
            $table->foreign('academicclass_id')->references('id')->on('academicclasses')->cascadeOnDelete()->cascadeOnUpdate();

            $table->unsignedBigInteger('academicclassable_id');
            $table->string('academicclassable_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academicclassables');
    }
};
