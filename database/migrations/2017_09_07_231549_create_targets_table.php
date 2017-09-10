<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Target;
use Charis\EntityTarget;

class CreateTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Target::TABLE_NAME, function (Blueprint $table) {
            $table->increments(Target::ID);
            $table->string(Target::NAME, 128);
        });

        DB::table(Target::TABLE_NAME)->insert(
            [
                [
                    Target::ID   => Target::ADULTS,
                    Target::NAME => 'Adultos'
                ],
                [
                    Target::ID   => Target::COMMUNITY,
                    Target::NAME => 'Comunidade'
                ],
                [
                    Target::ID   => Target::CHILDREN,
                    Target::NAME => 'Crianças'
                ],
                [
                    Target::ID   => Target::ENVIRONMENT,
                    Target::NAME => 'Fauna e Flora'
                ],
                [
                    Target::ID   => Target::ELDERLY,
                    Target::NAME => 'Idosos'
                ],
                [
                    Target::ID   => Target::TEENAGER,
                    Target::NAME => 'Jovens'
                ],
                [
                    Target::ID   => Target::SPECIAL_CONDITIONS,
                    Target::NAME => 'Pessoas com deficiência'
                ],
                [
                    Target::ID   => Target::GENERAL,
                    Target::NAME => 'Público em geral'
                ]
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
        Schema::dropIfExists(Target::TABLE_NAME);
    }
}
