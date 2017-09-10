<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\RolePermission;

class CreateRolePermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(RolePermission::TABLE_NAME, function (Blueprint $table) {
            $table->increments(RolePermission::ID);
            $table->integer(RolePermission::ID_ROLE)->unsignable();
            $table->integer(RolePermission::ID_PERMISSION)->unsignable();
        });
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
