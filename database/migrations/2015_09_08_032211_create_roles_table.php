<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Models\Role;

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
            $table->timestamps();
        });

        DB::table(Role::TABLE_NAME)->insert(
            [
                [
                    Role::ID   => Role::ID_SYSTEM_ADMIN_USER,
                    Role::NAME => "Administrator",
                    Role::DESCRIPTION => "Manages system"
                ],
                [
                    Role::ID   => Role::ID_REGISTERED_USER,
                    Role::NAME => "Registered user",
                    Role::DESCRIPTION => "Logged in"
                ],
                [
                    Role::ID   => Role::ID_UNSUPERVISED_USER,
                    Role::NAME => "Unsupervised user",
                    Role::DESCRIPTION => "Logged out"
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
