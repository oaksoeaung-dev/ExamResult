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
        Schema::table('students', function (Blueprint $table) {
            $table->string('stdId')->after('id')->unique();
            $table->string('stdKey')->after('stdId')->unique();
            $table->string("address")->after("phone")->nullable();
            $table->date("dob")->after("address")->nullable();
            $table->string("guardian_name")->after("dob")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn("stdId");
            $table->dropColumn("stdKey");
            $table->dropColumn("address");
            $table->dropColumn("dob");
            $table->dropColumn("guardian_name");
        });
    }
};
