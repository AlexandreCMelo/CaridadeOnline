<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Organization;
use Charis\OrganizationTarget;
use Charis\Target;

class CreateOrganizationTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(OrganizationTarget::TABLE_NAME, function (Blueprint $table) {
            $table->increments(OrganizationTarget::ID);
            $table->integer(OrganizationTarget::ID_ORGANIZATION);
            $table->integer(OrganizationTarget::ID_TARGET);


            $table->foreign(OrganizationTarget::ID_ORGANIZATION)
                ->references(Organization::ID)
                ->on(Organization::TABLE_NAME)->onDelete('cascade');

            $table->foreign(OrganizationTarget::ID_TARGET)
                ->references(Target::ID)
                ->on(Target::TABLE_NAME)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(OrganizationTarget::TABLE_NAME);
    }
}
