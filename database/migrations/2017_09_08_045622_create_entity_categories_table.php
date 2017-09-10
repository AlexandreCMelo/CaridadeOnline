<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Entity;
use Charis\EntityCategory;
use Charis\Category;

class CreateEntityCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(EntityCategory::TABLE_NAME, function (Blueprint $table) {
            $table->integer(EntityCategory::ID_ENTITY)->unsinable();
            $table->integer(EntityCategory::ID_CATEGORY)->unsinable();

            $table->foreign(EntityCategory::ID_ENTITY)
                ->references(Entity::ID)
                ->on(Entity::TABLE_NAME);

            $table->foreign(EntityCategory::ID_CATEGORY)
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
        Schema::dropIfExists(EntityCategory::TABLE_NAME);
    }
}
