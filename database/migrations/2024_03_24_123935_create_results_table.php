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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            // 書籍とカテゴリ履歴マッチしたものをここに

            $table->unsignedBigInteger('illustration_id'); // 外部キーのカラムを追加
            $table->foreign('illustration_id')->references('id')->on('illustrations'); // 外部キー制約を追加
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
