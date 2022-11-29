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
        Schema::create('sectors', function (Blueprint $table) {
            $table->id();
            $table->integer('old_id')->length(11)->nullable();
            $table->string('hex', 11)->unique();
            $table->integer('user_id')->length(11);
            $table->string('name');
            $table->string('slug');
            $table->string('english_name')->nullable();
            $table->string('english_slug')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('color_id', 6)->nullable();
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
        Schema::dropIfExists('sectors');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
