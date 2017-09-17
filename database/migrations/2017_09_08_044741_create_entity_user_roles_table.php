<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\User;
use Charis\Role;
use Charis\EntityRoleUser;
use Charis\Entity;


class CreateEntityUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(EntityRoleUser::TABLE_NAME, function (Blueprint $table) {
            $table->increments(EntityRoleUser::ID);
            $table->integer(EntityRoleUser::ID_USER)->unsignable();
            $table->integer(EntityRoleUser::ID_ROLE)->unsignable();
            $table->integer(EntityRoleUser::ID_ENTITY)->unsignable();
            $table->timestamps();


            $table->foreign(EntityRoleUser::ID_USER)
                ->references(User::ID)
                ->on(User::TABLE_NAME)->onDelete('cascade');

            $table->foreign(EntityRoleUser::ID_ROLE)
                ->references(Role::ID)
                ->on(Role::TABLE_NAME);

            $table->foreign(EntityRoleUser::ID_ENTITY)
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
        Schema::dropIfExists(EntityRoleUser::TABLE_NAME);
    }
}
