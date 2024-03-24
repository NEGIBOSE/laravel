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
        Schema::create('illustrations', function (Blueprint $table) {
            $table->id();
            $table->string('');
            $table->unsignedBigInteger('category_id'); // 外部キーのカラムを追加
            $table->foreign('category_id')->references('id')->on('categories'); // 外部キー制約を追加
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('illustrations');
    }
};
