<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Entity;
use Charis\Country;
use Charis\Locale;
use Charis\Timezone;

class CreateEntityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Entity::TABLE_NAME, function (Blueprint $table) {
            $table->increments(Entity::ID);
            $table->integer(Entity::ID_COUNTRY);
            $table->string(Entity::ID_TIMEZONE, 255);
            $table->string(Entity::ID_LOCALE, 8);
            $table->string(Entity::SRC, 64);
            $table->string(Entity::NAME);
            $table->string(Entity::EMAIL);
            $table->text(Entity::DESCRIPTION);
            $table->text(Entity::SHORT_DESCRIPTION);
            $table->string(Entity::PHONE, 128);
            $table->string(Entity::WEBSITE, 255);
            $table->text(Entity::ADDRESS);
            $table->string(Entity::STATE);
            $table->string(Entity::DISTRICT, 128);
            $table->string(Entity::CITY, 128);
            $table->string(Entity::ZIP_CODE, 128);
            $table->softDeletes();
            $table->timestampsTz();

            $table->foreign(Entity::ID_COUNTRY)
                ->references(Country::ID)
                ->on(Country::TABLE_NAME);

            $table->foreign(Entity::ID_TIMEZONE)
                ->references(Timezone::ID)
                ->on(Timezone::TABLE_NAME);

            $table->foreign(Entity::ID_LOCALE)
                ->references(Locale::ID)
                ->on(Locale::TABLE_NAME);

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
