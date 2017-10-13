<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Models\Organization;
use Charis\Models\ActivityOrganization;
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
        Schema::create(ActivityOrganization::TABLE_NAME, function (Blueprint $table) {
            $table->increments(ActivityOrganization::ID);
            $table->integer(ActivityOrganization::ID_ORGANIZATION)->unsignable();
            $table->integer(ActivityOrganization::ID_ACTIVITY)->unsignable();

            $table->foreign(ActivityOrganization::ID_ORGANIZATION)
                ->references(Organization::ID)
                ->on(Organization::TABLE_NAME);

            $table->foreign(ActivityOrganization::ID_ACTIVITY)
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
        Schema::dropIfExists(ActivityOrganization::TABLE_NAME);
    }
}
