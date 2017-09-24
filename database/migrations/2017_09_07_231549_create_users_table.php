<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Models\User;
use Charis\Models\Country;
use Charis\Models\Locale;
use Charis\Models\Timezone;
use Charis\Models\OwnerType;


class CreateUsersTable extends Migration
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
            $table->integer(User::ID_COUNTRY)->unsigned()->nullable();;
            $table->integer(User::ID_TIMEZONE)->unsigned()->nullable();;
            $table->string(User::ID_LOCALE, 8)->unsigned()->nullable();;
            $table->bigInteger(User::SRC)->nullable();
            $table->string(User::NAME);
            $table->string(User::EMAIL)->unique();
            $table->string(User::PASSWORD);
            $table->string(User::PHONE)->nullable();
            $table->jsonb(User::ATTRIBUTES)->nullable();
            $table->boolean('activated')->default(true);
            $table->string('token');
            $table->ipAddress('signup_ip_address')->nullable();
            $table->ipAddress('signup_confirmation_ip_address')->nullable();
            $table->ipAddress('signup_sm_ip_address')->nullable();
            $table->ipAddress('admin_ip_address')->nullable();
            $table->ipAddress('updated_ip_address')->nullable();
            $table->ipAddress('deleted_ip_address')->nullable();
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
