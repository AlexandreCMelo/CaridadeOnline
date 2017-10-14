<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Models\Comment;
use Charis\Models\Organization;
use Charis\Models\CommentType;
use Charis\Models\User;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Comment::TABLE_NAME, function (Blueprint $table) {
            $table->increments(Comment::ID);
            $table->integer(Comment::ID_ORGANIZATION)->unsigned();
            $table->integer(Comment::ID_TYPE)->unsigned();
            $table->integer(Comment::ID_USER)->unsigned();
            $table->text(Comment::CONTENT);


            $table->timestamps();

            $table->foreign(Comment::ID_ORGANIZATION)
                ->references(Organization::ID)
                ->on(Organization::TABLE_NAME);

            $table->foreign(Comment::ID_TYPE)
                ->references(CommentType::ID)
                ->on(CommentType::TABLE_NAME);

            $table->foreign(Comment::ID_USER)
                ->references(User::ID)
                ->on(User::TABLE_NAME);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Comment::TABLE_NAME);
    }
}
