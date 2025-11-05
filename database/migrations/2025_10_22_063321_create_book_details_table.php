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
        Schema::create('book_details', function (Blueprint $table) {
            // book_id를 books 테이블의 id를 참조하는 외래 키로 설정
            $table->foreignId('book_id')
                ->constrained('books') // 'books' 테이블 참조
                ->onDelete('cascade'); // book이 삭제되면 detail도 삭제

            // book_id를 이 테이블의 기본 키로 설정
            $table->primary('book_id');

            $table->string('isbn', 20)->unique(); // ISBN (고유값)
            $table->date('published_date'); // 출판일
            $table->integer('price')->unsigned(); // 가격 (양수)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_details');
    }
};
