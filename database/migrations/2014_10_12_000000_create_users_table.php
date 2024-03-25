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
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->timestamps();
        // });

        // Schema::table('users', function (Blueprint $table) {
        //     $table->foreignId('result_id')->constrained('results');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['result_id']);
            $table->dropColumn('result_id');
        });

        Schema::dropIfExists('users');
    }
};
