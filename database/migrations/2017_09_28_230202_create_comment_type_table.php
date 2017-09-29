<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Models\CommentType;

class CreateCommentTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(CommentType::TABLE_NAME, function (Blueprint $table) {
            $table->increments(CommentType::ID);
            $table->string(CommentType::NAME);
        });

        DB::table(CommentType::TABLE_NAME)->insert(
            [
                [
                    CommentType::ID   => CommentType::ORGANIZATION,
                    CommentType::NAME => "Organization comment",
                ],
                [
                    CommentType::ID   => CommentType::ALBUM,
                    CommentType::NAME => "Organization album comment",
                ]
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(CommentType::TABLE_NAME);
    }
}
