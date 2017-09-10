<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\AddressType;

class CreateAddressTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(AddressType::TABLE_NAME, function (Blueprint $table) {
            $table->increments(AddressType::ID);
            $table->string(AddressType::NAME);
            $table->string(AddressType::DESCRIPTION);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(AddressType::TABLE_NAME);
    }
}
