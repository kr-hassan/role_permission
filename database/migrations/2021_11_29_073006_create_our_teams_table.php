<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_teams', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('name', 64);
            $table->string('designation', 32);
            $table->longText('description');
            $table->text('image');
            $table->string('fb', 191);
            $table->string('tw', 191);
            $table->string('sk', 191);
            $table->string('ln', 191);
            $table->string('in', 191);
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
        Schema::dropIfExists('our_teams');
    }
}
