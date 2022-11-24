<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industries', function (Blueprint $table) {
            $table->id();
            $table->integer('old_id')->nullable();
            $table->string('hex', 11);
            $table->foreignId('user_id')->nullable();
            $table->foreignId('sector_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('english_name')->nullable();
            $table->string('english_slug')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('color_id')->nullable();
            $table->timestamps();
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('industries');
    }
};
