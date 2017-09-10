<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\User;
use Charis\Country;
use Charis\Locale;
use Charis\Timezone;
use Charis\OwnerType;


class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(User::TABLE_NAME, function (Blueprint $table) {

            $table->bigIncrements(User::ID);
            $table->integer(User::ID_COUNTRY)->unsigned();
            $table->string(User::ID_TIMEZONE)->unsigned();
            $table->string(User::ID_LOCALE, 8)->unsigned();
            $table->bigInteger(User::SRC)->nullable();
            $table->string(User::NAME);
            $table->string(User::EMAIL)->unique();
            $table->string(User::PASSWORD);
            $table->string(User::PHONE)->nullable();
            $table->jsonb(User::ATTRIBUTES)->nullable();
            $table->softDeletes();
            $table->timestampsTz();
            $table->rememberToken();

            $table->foreign(User::ID_COUNTRY)
                ->references(Country::ID)
                ->on(Country::TABLE_NAME);

            $table->foreign(User::ID_TIMEZONE)
                ->references(Timezone::ID)
                ->on(Timezone::TABLE_NAME);

            $table->foreign(User::ID_LOCALE)
                ->references(Locale::ID)
                ->on(Locale::TABLE_NAME);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(User::TABLE_NAME);
    }
}
