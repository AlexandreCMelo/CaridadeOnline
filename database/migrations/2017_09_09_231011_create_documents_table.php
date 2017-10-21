<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Models\Document;
use Charis\Models\DocumentType;

class CreateDocumentsTable extends Migration
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
            $table->integer(Document::ID_TYPE)->unsigned();
            $table->integer(Document::ID_OWNER)->unsigned();
            $table->string(Document::OWNER_TYPE);
            $table->string(Document::VALUE);
            $table->timestamps();

            $table->foreign(Document::ID_TYPE)
                ->references(DocumentType::ID)
                ->on(DocumentType::TABLE_NAME);
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
