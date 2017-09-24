<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Models\OrganizationRole;

class CreateOrganizationRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(OrganizationRole::TABLE_NAME, function (Blueprint $table) {
            $table->increments(OrganizationRole::ID);
            $table->string(OrganizationRole::NAME, 128);
            $table->text(OrganizationRole::DESCRIPTION);
            $table->timestampsTz();
        });

        DB::table(OrganizationRole::TABLE_NAME)->insert(
            [
                [
                    OrganizationRole::ID   => OrganizationRole::ID_ORGANIZATION_FOLLOWER,
                    OrganizationRole::NAME => "Organization Follower",
                    OrganizationRole::DESCRIPTION => "Follows Organization"
                ],
                [
                    OrganizationRole::ID   => OrganizationRole::ID_ORGANIZATION_PARTNER,
                    OrganizationRole::NAME => "Organization Partner",
                    OrganizationRole::DESCRIPTION => "Speaks for Organization sake"
                ],
                [
                    OrganizationRole::ID   => OrganizationRole::ID_ORGANIZATION_MANAGER,
                    OrganizationRole::NAME => "Organization Manager",
                    OrganizationRole::DESCRIPTION => "Manages an Organization"
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
        Schema::dropIfExists(OrganizationRole::TABLE_NAME);
    }
}
