<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Models\User;
use Charis\Models\OrganizationRole;
use Charis\Models\OrganizationRoleUser;
use Charis\Models\Organization;

class CreateOrganizationRoleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(OrganizationRoleUser::TABLE_NAME, function (Blueprint $table) {
            $table->integer(OrganizationRoleUser::ID_USER)->unsigned();
            $table->integer(OrganizationRoleUser::ID_ROLE)->unsigned();
            $table->integer(OrganizationRoleUser::ID_ORGANIZATION)->unsigned();
            $table->timestamps();


            $table->foreign(OrganizationRoleUser::ID_USER)
                ->references(User::ID)
                ->on(User::TABLE_NAME)->onDelete('cascade');

            $table->foreign(OrganizationRoleUser::ID_ROLE)
                ->references(OrganizationRole::ID)
                ->on(OrganizationRole::TABLE_NAME);

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
