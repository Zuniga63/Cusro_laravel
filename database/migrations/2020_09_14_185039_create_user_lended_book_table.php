<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLendedBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_lended_book', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('user');
            $table->foreignId('book_id')->constrained('book');
            $table->dateTime('lend_date')->useCurrent();
            $table->string('lend_to', 100);
            $table->boolean('state')->default(true);
            $table->dateTime('return_date')->nullable();
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_lended_book');
    }
}
