<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Document;

class CreateDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Document::TABLE_NAME, function (Blueprint $table) {
            $table->increments(Document::ID);
            $table->integer(Document::ID_OWNER_TYPE)->unsigned();
            $table->integer(Document::ID_OWNER)->unsigned();
            $table->string(Document::VALUE);
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Document::TABLE_NAME);
    }
}
