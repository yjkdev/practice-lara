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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);

            // authors 테이블의 id를 참조하는 외래 키
            $table->foreignId('author_id')->constrained('authors');

            // publishers 테이블의 id를 참조하는 외래 키
            $table->foreignId('publisher_id')->constrained('publishers');
            
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
