<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Models\Organization;
use Charis\Models\Country;
use Charis\Models\Locale;
use Charis\Models\Timezone;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Organization::TABLE_NAME, function (Blueprint $table) {
            $table->increments(Organization::ID);
            $table->integer(Organization::ID_COUNTRY)->unsigned()->nullable();
            $table->integer(Organization::ID_TIMEZONE)->unsigned()->nullable();
            $table->string(Organization::ID_LOCALE, 8)->unsigned()->nullable();
            $table->string(Organization::SRC, 64)->nullable();
            $table->string(Organization::NAME);
            $table->string(Organization::EMAIL)->nullable();;
            $table->text(Organization::DESCRIPTION)->nullable();;
            $table->text(Organization::SHORT_DESCRIPTION)->nullable();
            $table->string(Organization::PHONE, 128)->nullable();;
            $table->string(Organization::WEBSITE, 255)->nullable();;
            $table->softDeletes();
            $table->timestampsTz();

            $table->foreign(Organization::ID_COUNTRY)
                ->references(Country::ID)
                ->on(Country::TABLE_NAME);

            $table->foreign(Organization::ID_TIMEZONE)
                ->references(Timezone::ID)
                ->on(Timezone::TABLE_NAME);

            $table->foreign(Organization::ID_LOCALE)
                ->references(Locale::ID)
                ->on(Locale::TABLE_NAME);

            $table->index([Organization::ID]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Organization::TABLE_NAME);
    }
}
