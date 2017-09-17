<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Category;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Category::TABLE_NAME, function (Blueprint $table) {
            $table->increments(Category::ID);
            $table->string(Category::NAME, 128);
            $table->timestamps();
        });

        DB::table(Category::TABLE_NAME)->insert(
            [
                [
                    Category::ID   => Category::SOCIAL_ASSISTANCE,
                    Category::NAME => 'Assistência Social'
                ],
                [
                    Category::ID   => Category::CITIZENSHIP,
                    Category::NAME => 'Cidadania'
                ],
                [
                    Category::ID   => Category::CULTURE_ARTS_AND_SPORT,
                    Category::NAME => 'Cultura, artes e esportes'
                ],
                [
                    Category::ID   => Category::EDUCATION,
                    Category::NAME => 'Educação'
                ],
                [
                    Category::ID   => Category::ENVIRONMENTAL_HEALTH,
                    Category::NAME => 'Meio Ambiente'
                ],
                [
                    Category::ID   => Category::ANIMAL_HEALTH,
                    Category::NAME => 'Cuidado com animais'
                ],
                [
                    Category::ID   => Category::HEALTH,
                    Category::NAME => 'Saúde'
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
        Schema::dropIfExists(Category::TABLE_NAME);
    }
}
