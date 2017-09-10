<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\UserEntityRole;

class CreateUserEntityRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(UserEntityRole::TABLE_NAME, function (Blueprint $table) {
            $table->increments(UserEntityRole::ID);
            $table->integer(UserEntityRole::ID_USER)->unsignable();
            $table->integer(UserEntityRole::ID_ROLE)->unsignable();
            $table->integer(UserEntityRole::ID_ENTITY)->unsignable();
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(UserEntityRole::TABLE_NAME);
    }
}
