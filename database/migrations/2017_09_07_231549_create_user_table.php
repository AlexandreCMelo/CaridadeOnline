<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\User;
use Charis\Country;
use Charis\Locale;
use Charis\Timezone;

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
            $table->bigInteger(User::SRC);
            $table->string(User::NAME);
            $table->string(User::EMAIL)->unique();
            $table->string(User::PASSWORD);
            $table->integer(User::ID_COUNTRY)->unsigned()->nullable();
            $table->string(User::STATE)->nullable();
            $table->string(User::CITY)->nullable();
            $table->string(User::DISTRICT)->nullable();
            $table->string(User::ADDRESS)->nullable();
            $table->string(User::ZIP_CODE)->nullable();
            $table->string(User::PHONE)->nullable();
            $table->string(User::TIMEZONE_CODE)->unsigned()->nullable();
            $table->string(User::LOCALE_CODE, 8)->unsigned()->nullable();
            $table->jsonb(User::ATTRIBUTES)->nullable();
            $table->softDeletes();
            $table->timestampsTz();
            $table->rememberToken();

            $table->foreign(User::ID_COUNTRY)
                ->references(Country::ID)
                ->on(Country::TABLE_NAME);

            $table->foreign(User::TIMEZONE_CODE)
                ->references(Timezone::ID)
                ->on(Timezone::TABLE_NAME);

            $table->foreign(User::LOCALE_CODE)
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
