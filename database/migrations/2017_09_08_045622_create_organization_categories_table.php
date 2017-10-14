<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Models\Organization;
use Charis\Models\CategoryOrganization;
use Charis\Models\Category;

class CreateOrganizationCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(CategoryOrganization::TABLE_NAME, function (Blueprint $table) {
            $table->integer(CategoryOrganization::ID_ORGANIZATION)->unsigned();
            $table->integer(CategoryOrganization::ID_CATEGORY)->unsigned();

            $table->foreign(CategoryOrganization::ID_ORGANIZATION)
                ->references(Organization::ID)
                ->on(Organization::TABLE_NAME);

            $table->foreign(CategoryOrganization::ID_CATEGORY)
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
        Schema::dropIfExists(CategoryOrganization::TABLE_NAME);
    }
}
