<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\EntityActivity;

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
            $table->increments(EntityActivity::ID);
            $table->integer(EntityActivity::ID_ENTITY)->unsignable();
            $table->integer(EntityActivity::ID_ACTIVITY)->unsignable();
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
