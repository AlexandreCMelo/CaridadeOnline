<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\DocumentType;

class CreateDocumentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DocumentType::TABLE_NAME, function (Blueprint $table) {
            $table->increments(DocumentType::ID);
            $table->string(DocumentType::NAME, 128);
            $table->string(DocumentType::DESCRIPTION);
            $table->timestampsTz();
        });

        DB::table(DocumentType::TABLE_NAME)->insert(
            [
                [
                    DocumentType::ID          => 10,
                    DocumentType::NAME        => "RG",
                    DocumentType::DESCRIPTION => "Brazilian main document"
                ],
                [
                    DocumentType::ID          => 20,
                    DocumentType::NAME        => "CPF",
                    DocumentType::DESCRIPTION => "Brazilian secondary document"
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
        Schema::dropIfExists(DocumentType::TABLE_NAME);
    }
}
