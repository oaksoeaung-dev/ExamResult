<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('stdId')->unique();
            $table->string('stdKey')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string("address")->nullable();
            $table->date("dob")->nullable();
            $table->string("guardian_name")->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
