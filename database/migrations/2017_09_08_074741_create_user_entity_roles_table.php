<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\UserEntityRole;

class CreateUserEntityRolesTable extends Migration
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
            $table->integer(UserEntityRole::ID_USER);
            $table->integer(UserEntityRole::ID_ROLE);
            $table->integer(UserEntityRole::ID_ENTITY);
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
