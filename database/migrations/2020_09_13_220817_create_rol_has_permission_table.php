<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolHasPermissionTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('rol_has_permission', function (Blueprint $table) {
      $table->id();
      $table->foreignId('rol_id')
        ->constrained('rol')
        ->onUpdate('cascade')
        ->onDelete('cascade');
      $table->foreignId('permission_id')
        ->constrained('permission')
        ->onUpdate('cascade')
        ->onDelete('cascade');
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
    Schema::dropIfExists('rol_has_permission');
  }
}
