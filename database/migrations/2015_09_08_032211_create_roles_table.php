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
            $table->string(Role::DISPLAY_NAME)->unique();
            $table->string(Role::NAME);
            $table->string(Role::DESCRIPTION)->nullable();
            $table->timestamps();
        });

        DB::table(Role::TABLE_NAME)->insert(
            [
                /*
                [
                    Role::ID   => Role::ID_ENTITY_FOLLOWER,
                    Role::DISPLAY_NAME => "Entity Follower",
                    Role::DESCRIPTION => "Follows entity"
                ],
                [
                    Role::ID   => Role::ID_ENTITY_PARTNER,
                    Role::DISPLAY_NAME => "Entity Partner",
                    Role::DESCRIPTION => "Speaks for entity sake"
                ],
                [
                    Role::ID   => Role::ID_ENTITY_MANAGER,
                    Role::DISPLAY_NAME => "Entity Manager",
                    Role::DESCRIPTION => "Manages an entity"
                ],
                */
                [
                    Role::ID   => Role::ID_NORMAL,
                    Role::DISPLAY_NAME => "Normal",
                    Role::NAME => "Normal",
                    Role::DESCRIPTION => "Regular User"
                ],
                [
                    Role::ID   => Role::ID_SYSADM,
                    Role::DISPLAY_NAME => "Administrator",
                    Role::NAME => "admin",
                    Role::DESCRIPTION => "Manages system"
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
