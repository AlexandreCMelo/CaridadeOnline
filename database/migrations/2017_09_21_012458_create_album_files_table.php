<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Models\AlbumFile;
use Charis\Models\Album;
use Charis\Models\File;

class CreateAlbumFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(AlbumFile::TABLE_NAME, function (Blueprint $table) {
            $table->integer(AlbumFile::ID_ALBUM)->unsigned();
            $table->integer(AlbumFile::ID_FILE)->unsigned();
            $table->integer(AlbumFile::CREATED_BY)->unsigned();
            $table->timestamps();


            $table->foreign(AlbumFile::ID_ALBUM)
                ->references(Album::ID)
                ->on(Album::TABLE_NAME);


            $table->foreign(AlbumFile::ID_FILE)
                ->references(File::ID)
                ->on(File::TABLE_NAME);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(AlbumFile::TABLE_NAME);
    }
}
