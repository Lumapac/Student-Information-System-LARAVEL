<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('students', function (Blueprint $table) {
    $table->id();
    $table->bigInteger('std_id')->unique();
    $table->string('std_firstname');
    $table->string('std_lastname');
    $table->string('std_middlename')->nullable();
    $table->integer('std_age');
    $table->string('std_course');
    $table->string('std_address');
    $table->string('std_email')->unique();
    $table->foreign('std_email')->references('email')->on('users')->onDelete('cascade');
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
