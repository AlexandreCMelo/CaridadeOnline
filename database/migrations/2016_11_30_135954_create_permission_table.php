<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Charis\Models\Permission;

class CreatePermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create(Permission::TABLE_NAME, function (Blueprint $table) {
            $table->increments(Permission::ID);
            $table->string(Permission::CODE)->index();
            $table->string(Permission::DESCRIPTION);
            $table->timestampsTz();
        });


        DB::table(Permission::TABLE_NAME)->insert(
            [
                [
                    Permission::ID   => Permission::CAN_MANAGE_ORGANIZATION_INFO,
                    Permission::CODE => Permission::CAN_MANAGE_ORGANIZATION_INFO_CODE,
                    Permission::DESCRIPTION => "Can edit organization main information"
                ],
                [
                    Permission::ID   => Permission::CAN_MANAGE_ORGANIZATION_COMMENTS,
                    Permission::CODE => Permission::CAN_MANAGE_ORGANIZATION_COMMENTS_CODE,
                    Permission::DESCRIPTION => "Can manage organization comments"
                ],
                [
                    Permission::ID   => Permission::CAN_MANAGE_ORGANIZATION_USERS,
                    Permission::CODE => Permission::CAN_MANAGE_ORGANIZATION_USERS_CODE,
                    Permission::DESCRIPTION => "Can manage organization users"
                ],
                [
                    Permission::ID   => Permission::CAN_UPDATE_ORGANIZATION_PICTURE,
                    Permission::CODE => Permission::CAN_UPDATE_ORGANIZATION_PICTURE_CODE,
                    Permission::DESCRIPTION => "Can manage organization pictures"
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
