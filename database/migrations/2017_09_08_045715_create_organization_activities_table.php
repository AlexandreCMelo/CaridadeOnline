<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Models\Organization;
use Charis\Models\OrganizationActivity;
use Charis\Models\Activity;

class CreateOrganizationActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(OrganizationActivity::TABLE_NAME, function (Blueprint $table) {
            $table->increments(OrganizationActivity::ID);
            $table->integer(OrganizationActivity::ID_ORGANIZATION)->unsignable();
            $table->integer(OrganizationActivity::ID_ACTIVITY)->unsignable();

            $table->foreign(OrganizationActivity::ID_ORGANIZATION)
                ->references(Organization::ID)
                ->on(Organization::TABLE_NAME);

            $table->foreign(OrganizationActivity::ID_ACTIVITY)
                ->references(Activity::ID)
                ->on(Activity::TABLE_NAME);

        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(OrganizationActivity::TABLE_NAME);
    }
}
