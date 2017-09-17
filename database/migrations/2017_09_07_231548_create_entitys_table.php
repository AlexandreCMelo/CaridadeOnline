<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Entity;
use Charis\Country;
use Charis\Locale;
use Charis\Timezone;

class CreateEntitysTable extends Migration
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
            $table->integer(Entity::ID_COUNTRY)->unsignable()->nullable();
            $table->integer(Entity::ID_TIMEZONE)->unsignable()->nullable();
            $table->string(Entity::ID_LOCALE, 8)->unsignable()->nullable();
            $table->string(Entity::SRC, 64)->nullable();
            $table->string(Entity::NAME);
            $table->string(Entity::EMAIL)->nullable();;
            $table->text(Entity::DESCRIPTION)->nullable();;
            $table->text(Entity::SHORT_DESCRIPTION)->nullable();
            $table->string(Entity::PHONE, 128)->nullable();;
            $table->string(Entity::WEBSITE, 255)->nullable();;
            $table->softDeletes();
            $table->timestamps();

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
        Schema::dropIfExists(Entity::TABLE_NAME);
    }
}
