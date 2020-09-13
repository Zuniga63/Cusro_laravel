<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHasRolTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('user_has_rol', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')
        ->constrained('user')
        ->onDelete('cascade')
        ->onUpdate('restrict');
      $table->foreignId('rol_id')
        ->constrained('rol')
        ->onDelete('cascade')
        ->onUpdate('restrict');
      $table->boolean('state')->default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('user_has_rol');
  }
}
