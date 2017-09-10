<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\User;
use Charis\Role;
use Charis\UserEntityRole;
use Charis\Entity;


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


            $table->foreign(UserEntityRole::ID_USER)
                ->references(User::ID)
                ->on(User::TABLE_NAME);

            $table->foreign(UserEntityRole::ID_ROLE)
                ->references(Role::ID)
                ->on(Role::TABLE_NAME);

            $table->foreign(UserEntityRole::ID_ENTITY)
                ->references(Entity::ID)
                ->on(Entity::TABLE_NAME);
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
