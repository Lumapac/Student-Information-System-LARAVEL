<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('enroll_students', function (Blueprint $table) {
            $table->string('grade', 10)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('enroll_students', function (Blueprint $table) {
            $table->decimal('grade', 5, 2)->nullable()->change();
        });
    }
};
