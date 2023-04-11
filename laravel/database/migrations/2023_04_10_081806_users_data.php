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
        Schema::create('users_data', function (Blueprint $table) {
            $table->id();
            $table->string('USERNAME');
            $table->string('PASSWORD');
            $table->string('FNAME');
            $table->string('LNAME');
            $table->string('STATUS');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_data');
    }
};
