\<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Charis\Models\OrganizationPermissionRole;
use Charis\Models\OrganizationRole;
use Charis\Models\Permission;

class CreateOrganizationPermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(OrganizationPermissionRole::TABLE_NAME, function (Blueprint $table) {
            $table->primary([OrganizationPermissionRole::ID_PERMISSION, OrganizationPermissionRole::ID_ROLE]);
            $table->integer(OrganizationPermissionRole::ID_PERMISSION)->unsigned()->index();
            $table->integer(OrganizationPermissionRole::ID_ROLE)->unsigned()->index();


            $table->foreign(OrganizationPermissionRole::ID_PERMISSION)
                ->references(Permission::ID)
                ->on(Permission::TABLE_NAME)
                ->onDelete('cascade');

            $table->foreign(OrganizationPermissionRole::ID_ROLE)
                ->references(OrganizationRole::ID)
                ->on(OrganizationRole::TABLE_NAME)
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(OrganizationPermissionRole::TABLE_NAME);
    }
}
