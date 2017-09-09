<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Role;

class CreateRoleTable extends Migration
{
    /**
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

            DB::table(Role::TABLE_NAME)->insert(
                [
                    [
                        Role::ID   => Role::ID_ADMIN,
                        Role::NAME => "Admin",
                    ],
                    [
                        Role::ID   => Role::ID_ENTITY_CONTACT,
                        Role::NAME => "Entity Contact",
                    ],
                    [
                        Role::ID   => Role::ID_ENTITY_MANAGER,
                        Role::NAME => "Entity Manager",
                    ],
                    [
                        Role::ID   => Role::ID_REGULAR_USER,
                        Role::NAME => "Regular User",
                    ]
                ]
            );
        });
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
