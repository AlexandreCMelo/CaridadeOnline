<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\User;
use Charis\Role;
use Charis\OrganizationRoleUser;
use Charis\Organization;


class CreateOrganizationUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(OrganizationRoleUser::TABLE_NAME, function (Blueprint $table) {
            $table->increments(OrganizationRoleUser::ID);
            $table->integer(OrganizationRoleUser::ID_USER)->unsignable();
            $table->integer(OrganizationRoleUser::ID_ROLE)->unsignable();
            $table->integer(OrganizationRoleUser::ID_ORGANIZATION)->unsignable();
            $table->timestamps();


            $table->foreign(OrganizationRoleUser::ID_USER)
                ->references(User::ID)
                ->on(User::TABLE_NAME)->onDelete('cascade');

            $table->foreign(OrganizationRoleUser::ID_ROLE)
                ->references(Role::ID)
                ->on(Role::TABLE_NAME);

            $table->foreign(OrganizationRoleUser::ID_ORGANIZATION)
                ->references(Organization::ID)
                ->on(Organization::TABLE_NAME);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(OrganizationRoleUser::TABLE_NAME);
    }
}
