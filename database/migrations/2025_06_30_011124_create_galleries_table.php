<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('galleries', function (Blueprint $table) {
      $table->id();
      $table->string('title', 40);
      $table->string('thumbnail', 80)->nullable();
      $table->text('body');
      $table->string('type', 15);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('galleries');
  }
};
