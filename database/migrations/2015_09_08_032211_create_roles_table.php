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
            $table->string(Role::NAME)->unique();
            $table->string(Role::DESCRIPTION)->nullable();
            $table->timestampsTz();
        });

        DB::table(Role::TABLE_NAME)->insert(
            [
                [
                    Role::ID   => Role::ID_ORGANIZATION_FOLLOWER,
                    Role::NAME => "Organization Follower",
                    Role::DESCRIPTION => "Follows Organization"
                ],
                [
                    Role::ID   => Role::ID_ORGANIZATION_PARTNER,
                    Role::NAME => "Organization Partner",
                    Role::DESCRIPTION => "Speaks for Organization sake"
                ],
                [
                    Role::ID   => Role::ID_ORGANIZATION_MANAGER,
                    Role::NAME => "Organization Manager",
                    Role::DESCRIPTION => "Manages an Organization"
                ],
                [
                    Role::ID   => Role::ID_SYSTEM_ADMIN,
                    Role::NAME => "Administrator",
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
