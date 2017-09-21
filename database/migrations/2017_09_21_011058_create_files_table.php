<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\File;
use Charis\FileType;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(File::TABLE_NAME, function (Blueprint $table) {
            $table->increments(File::ID);
            $table->integer(File::ID_FILE_TYPE)->unsigned();
            $table->integer(File::ID_FILE_OWNER)->unsigned()->nullable();
            $table->string(File::FILE_OWNER)->unsigned()->nullable();
            $table->string(File::NAME);
            $table->string(File::PATH);
            $table->string(File::MIME_TYPE);
            $table->string(File::SIZE);
            $table->jsonb(File::ATTRIBUTES)->nullable();
            $table->timestamps();


            $table->foreign(File::ID_FILE_TYPE)
                ->references(FileType::ID)
                ->on(FileType::TABLE_NAME);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(File::TABLE_NAME);
    }
}
