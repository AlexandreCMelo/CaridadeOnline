<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Organization;
use Charis\OrganizationCategory;
use Charis\Category;

class CreateOrganizationCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(OrganizationCategory::TABLE_NAME, function (Blueprint $table) {
            $table->increments(OrganizationCategory::ID);
            $table->integer(OrganizationCategory::ID_ORGANIZATION)->unsinable();
            $table->integer(OrganizationCategory::ID_CATEGORY)->unsinable();

            $table->foreign(OrganizationCategory::ID_ORGANIZATION)
                ->references(Organization::ID)
                ->on(Organization::TABLE_NAME);

            $table->foreign(OrganizationCategory::ID_CATEGORY)
                ->references(Category::ID)
                ->on(Category::TABLE_NAME);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(OrganizationCategory::TABLE_NAME);
    }
}
