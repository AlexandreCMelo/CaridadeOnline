<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Entity;

class CreateEntityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Entity::TABLE_FULL_NAME, function (Blueprint $table) {
            $table->increments(Entity::ID);
            $table->string(Entity::SRC, 64);
            $table->string(Entity::NAME);
            $table->text(Entity::DESCRIPTION);
            $table->text(Entity::SHORT_DESCRIPTION);
            $table->string(Entity::EMAIL);
            $table->string(Entity::PHONE, 128);
            $table->string(Entity::WEBSITE, 255);
            $table->string(Entity::TIMEZONE, 255);
            $table->integer(Entity::ID_COUNTRY);
            $table->text(Entity::ADDRESS);
            $table->string(Entity::STATE);
            $table->string(Entity::DISTRICT, 128);
            $table->string(Entity::CITY, 128);
            $table->string(Entity::ZIP_CODE, 128);
            $table->string(Entity::ID_LOCALE, 8);
            $table->softDeletes();
            $table->timestampsTz();

            $table->index([Entity::ID]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity');
    }
}
