<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\OwnerType;

class CreateOwnerTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(OwnerType::TABLE_NAME, function (Blueprint $table) {
            $table->increments(OwnerType::ID);
            $table->string(OwnerType::NAME);
        });

        DB::table(OwnerType::TABLE_NAME)->insert(
            [
                [
                    OwnerType::ID   => OwnerType::OWNER_TYPE_USER,
                    OwnerType::NAME => "User",
                ],
                [
                    OwnerType::ID   => OwnerType::OWNER_TYPE_ENTITY,
                    OwnerType::NAME => "Entity",
                ]
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
        Schema::dropIfExists(OwnerType::TABLE_NAME);
    }
}
