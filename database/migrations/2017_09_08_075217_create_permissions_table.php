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
                    Permission::ID          => Permission::ENTITY_FOLLOWER,
                    Permission::NAME        => "Entity Followers",
                    Permission::DESCRIPTION => "Follows entity"
                ],
                [
                    Permission::ID          => Permission::ENTITY_PARTNER,
                    Permission::NAME        => "Entity Partner",
                    Permission::DESCRIPTION => "Can reply as entity on several entity actitivies"
                ],
                [
                    Permission::ID          => Permission::ENTITY_MANAGER,
                    Permission::NAME        => "Entity Manager",
                    Permission::DESCRIPTION => "Allows the user to create, albuns and update entity information"
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
