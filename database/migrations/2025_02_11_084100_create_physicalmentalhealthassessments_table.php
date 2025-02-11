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
        Schema::create('physicalmentalhealthassessments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('student_id')->unique();
            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete()->cascadeOnUpdate();

            $table->string("eyes_and_pupils");
            $table->string("nose");
            $table->string("throat");
            $table->string("teeth_and_Mouth");
            $table->string("lungs_and_chest");
            $table->string("cardiovascular_system");
            $table->string("abdomen");
            $table->string("extremities_and_back");
            $table->string("musculoskeletal");
            $table->string("mental_health_status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physicalmentalhealthassessments');
    }
};
