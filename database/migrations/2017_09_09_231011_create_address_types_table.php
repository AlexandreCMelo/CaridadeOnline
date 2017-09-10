<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\AddressType;

class CreateAddressTypesTable extends Migration
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

        DB::table(AddressType::TABLE_NAME)->insert(
            [
                [
                    AddressType::ID          => 10,
                    AddressType::NAME        => "Home",
                    AddressType::DESCRIPTION => "Home"
                ],
                [
                    AddressType::ID          => 20,
                    AddressType::NAME        => "Building",
                    AddressType::DESCRIPTION => "Building"
                ],
            ]
        );
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
