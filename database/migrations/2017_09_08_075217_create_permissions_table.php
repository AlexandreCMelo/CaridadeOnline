<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Permission;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Permission::TABLE_NAME, function (Blueprint $table) {
            $table->increments(Permission::TABLE_NAME);
            $table->integer(Permission::ID);
            $table->string(Permission::NAME, 128);
            $table->string(Permission::DESCRIPTION, 128);
        });

        DB::table(Permission::TABLE_NAME)->insert(
            [
                [
                    Permission::ID          => Permission::CAN_REPLY_ENTITY_MESSAGES,
                    Permission::NAME        => "Entity Contact",
                    Permission::DESCRIPTION => "Entity contact badge enables the user to reply to messages send to a entity"
                ],
                [
                    Permission::ID          => Permission::CAN_MANAGE_ENTITY,
                    Permission::NAME        => "Entity Manager",
                    Permission::DESCRIPTION => "Entity manager badge allows the user to create, albuns and update entity information"
                ],            [
                    Permission::ID          => Permission::CAN_MANAGE_SYSTEM,
                    Permission::NAME        => "System Manager",
                    Permission::DESCRIPTION => "System Administrator"
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Permission::TABLE_NAME);
    }
}
