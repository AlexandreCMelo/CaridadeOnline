<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\FileType;

class CreateFileTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(FileType::TABLE_NAME, function (Blueprint $table) {
            $table->increments(FileType::ID);
            $table->string(FileType::NAME);
            $table->timestamps();
        });

        DB::table(FileType::TABLE_NAME)->insert(
            [
                [
                    FileType::ID          => FileType::DOCUMENT,
                    FileType::NAME        => "Document",
                ],
                [
                    FileType::ID          => FileType::IMAGE,
                    FileType::NAME        => "Image",
                ],
                [
                    FileType::ID          => FileType::VIDEO,
                    FileType::NAME        => "Video",
                ],
                [
                    FileType::ID          => FileType::AVATAR,
                    FileType::NAME        => "Avatar",
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
        Schema::dropIfExists(FileType::TABLE_NAME);
    }
}
