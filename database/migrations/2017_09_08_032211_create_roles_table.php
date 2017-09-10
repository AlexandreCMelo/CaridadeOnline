<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Role;

class CreateRolesTable extends Migration
{
    /**
     * The most powerful flower set in secret
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Role::TABLE_NAME, function (Blueprint $table) {
            $table->increments(Role::ID);
            $table->string(Role::NAME);
            $table->string(Role::LABEL);
        });

        DB::table(Role::TABLE_NAME)->insert(
            [
                [
                    Role::ID   => Role::ID_ADMIN,
                    Role::NAME => "Admin",
                    Role::LABEL => "Platform administrator"
                ],
                [
                    Role::ID   => Role::ID_ENTITY_CONTACT,
                    Role::NAME => "Entity Contact",
                    Role::LABEL => "Can reply entity messages and requests"
                ],
                [
                    Role::ID   => Role::ID_ENTITY_MANAGER,
                    Role::NAME => "Entity Manager",
                    Role::LABEL => "Manages an entity and its contacts"
                ],
                [
                    Role::ID   => Role::ID_REGULAR_USER,
                    Role::NAME => "Normal User",
                    Role::LABEL => "Normal user"
                ]
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Role::TABLE_NAME);
    }
}
