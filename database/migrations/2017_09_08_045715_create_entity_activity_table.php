<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Entity;
use Charis\EntityActivity;
use Charis\Activity;

class CreateEntityActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(EntityActivity::TABLE_NAME, function (Blueprint $table) {
            $table->integer(EntityActivity::ID_ENTITY)->unsignable();
            $table->integer(EntityActivity::ID_ACTIVITY)->unsignable();

            $table->foreign(EntityActivity::ID_ENTITY)
                ->references(Entity::ID)
                ->on(Entity::TABLE_NAME);

            $table->foreign(EntityActivity::ID_ACTIVITY)
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
        Schema::dropIfExists(EntityActivity::TABLE_NAME);
    }
}
