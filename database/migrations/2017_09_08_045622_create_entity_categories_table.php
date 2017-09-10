<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\EntityCategory;

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
            $table->increments(EntityCategory::ID);
            $table->integer(EntityCategory::ID_ENTITY)->unsinable();
            $table->integer(EntityCategory::ID_CATEGORY)->unsinable();
            $table->timestamps();
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
