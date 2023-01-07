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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            // $table->integer('old_id');
            $table->string('hex', 11);
            $table->foreignId('article_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('logo')->nullable();
            $table->boolean('show_in_navbar')->nullable();
            $table->boolean('show_in_footer')->nullable();
            $table->string('link')->nullable();
            $table->timestamps();
            $table->boolean('active')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsors');
        Schema::dropIfExists('partners');
    }
};
