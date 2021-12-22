<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('caption', 32)->default('FEATURED PROJECT');
            $table->string('title', 32)->default('YOUR LIFE EASIER');
            $table->string('button_text', 32)->default('Our Portfolio');
            $table->text('image');
            $table->integer('priority')->unique()->nullable();
            $table->integer('status')->default(1)->comment('1 = Active & 0=Inactive');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
