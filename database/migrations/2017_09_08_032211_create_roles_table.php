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
                    Role::ID   => Role::ID_ENTITY_FOLLOWER,
                    Role::NAME => "Entity Follower",
                    Role::LABEL => "Follows entity"
                ],
                [
                    Role::ID   => Role::ID_ENTITY_PARTNER,
                    Role::NAME => "Entity Partner",
                    Role::LABEL => "Speaks for entity sake"
                ],
                [
                    Role::ID   => Role::ID_ENTITY_MANAGER,
                    Role::NAME => "Entity Manager",
                    Role::LABEL => "Manages an entity"
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
