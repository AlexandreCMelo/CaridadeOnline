'<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Models\Address;
use Charis\Models\AddressType;

class CreateAddressesTable extends Migration
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
            $table->string(Address::OWNER_TYPE);
            $table->integer(Address::ID_OWNER)->unsigned();
            $table->string(Address::STATE, 128);
            $table->string(Address::CITY,128);
            $table->string(Address::ADDRESS);
            $table->string(Address::DISTRICT,128)->nullable();
            $table->string(Address::ZIP_CODE)->nullable();
            $table->float(Address::LATITUDE,10, 6)->nullable();
            $table->float(Address::LONGITUDE, 10 ,6)->nullable();
            $table->timestamps();

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
