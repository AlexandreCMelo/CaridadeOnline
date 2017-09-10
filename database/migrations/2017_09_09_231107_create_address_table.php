<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Address;

class CreateAddressTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Address::TABLE_NAME, function (Blueprint $table) {
            $table->increments(Address::ID);
            $table->integer(Address::ID_COUNTRY)->unsigned();
            $table->string(Address::STATE, 128);
            $table->string(Address::CITY,128);
            $table->string(Address::DISTRICT,128);
            $table->string(Address::ZIP_CODE);
            $table->string(Address::ADDRESS);
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
        Schema::dropIfExists(Address::TABLE_NAME);
    }
}
