<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->foreignId('sector_id')->nullable()->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->string('english_name');
            $table->string('english_slug');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('industries');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
