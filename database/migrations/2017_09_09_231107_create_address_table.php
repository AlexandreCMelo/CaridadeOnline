'<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Address;
use Charis\AddressType;

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
            $table->integer(Address::ID_TYPE)->unsigned();
            $table->integer(Address::ID_COUNTRY)->unsigned();
            $table->string(Address::OWNER_TYPE)->unsigned();
            $table->integer(Address::ID_OWNER)->unsigned();
            $table->string(Address::STATE, 128)->nullable();
            $table->string(Address::CITY,128)->nullable();
            $table->string(Address::DISTRICT,128)->nullable();
            $table->string(Address::ZIP_CODE)->nullable();
            $table->string(Address::ADDRESS)->nullable();
            $table->timestampsTz();

            $table->foreign(Address::ID_TYPE)
                ->references(AddressType::ID)
                ->on(AddressType::TABLE_NAME);
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
