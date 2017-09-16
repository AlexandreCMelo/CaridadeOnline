<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\RolePermission;

class CreateRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(RolePermission::TABLE_NAME, function (Blueprint $table) {
            $table->integer(RolePermission::ID_ROLE)->unsignable();
            $table->integer(RolePermission::ID_PERMISSION)->unsignable();
        });


        DB::table(RolePermission::TABLE_NAME)->insert(
            [
                [
                    RolePermission::ID_ROLE       => \Charis\Role::ID_ENTITY_FOLLOWER,
                    RolePermission::ID_PERMISSION => \Charis\Permission::ENTITY_FOLLOWER
                ],
                [
                    RolePermission::ID_ROLE       => \Charis\Role::ID_ENTITY_MANAGER,
                    RolePermission::ID_PERMISSION => \Charis\Permission::ENTITY_MANAGER
                ],
                [
                    RolePermission::ID_ROLE       => \Charis\Role::ID_ENTITY_PARTNER,
                    RolePermission::ID_PERMISSION => \Charis\Permission::ENTITY_PARTNER
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
        Schema::dropIfExists(RolePermission::TABLE_NAME);
    }
}
