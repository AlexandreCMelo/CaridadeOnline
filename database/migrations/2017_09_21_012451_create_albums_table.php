<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Models\Album;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Album::TABLE_NAME, function (Blueprint $table) {
            $table->increments(Album::ID);
            $table->integer(Album::ID_ORGANIZATION)->unsigned();
            $table->string(Album::NAME);
            $table->integer(Album::CREATED_BY)->unsigned();
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
        Schema::dropIfExists(Album::TABLE_NAME);
    }
}
