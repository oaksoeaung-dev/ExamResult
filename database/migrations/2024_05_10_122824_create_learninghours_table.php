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
        Schema::create('learninghours', function (Blueprint $table) {
            $table->id();
            $table->string("grade");
            $table->string("program");
            $table->enum('campus',['online','oncampus']);
            $table->string('subjectcategory');
            $table->string('subjectname');
            $table->string('hour');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learninghours');
    }
};
