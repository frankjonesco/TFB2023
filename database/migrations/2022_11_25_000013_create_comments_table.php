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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('resource_type');
            $table->integer('resource_id');
            $table->string('author_name')->nullable();
            $table->string('author_email')->nullable();
            $table->string('title')->nullable();
            $table->text('body');
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
        Schema::dropIfExists('comments');
    }
};
