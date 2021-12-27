<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
//            $table->unsignedInteger('role_id');
//            $table->foreign('role_id')->references('id')->on('user_roles')->onDelete('cascade');
//            $table->unsignedInteger('permission_id');
//            $table->foreign('permission_id')->references('id')->on('user_permissions')->onDelete('cascade');
            $table->string('name', 64);
            $table->string('phone', 32)->unique();
            $table->string('email', 32)->unique();
            $table->string('password', 191);
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
        Schema::dropIfExists('users');
    }
}
