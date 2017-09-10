<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Entity;
use Charis\EntityTarget;
use Charis\Target;

class CreateEntityTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(EntityTarget::TABLE_NAME, function (Blueprint $table) {
            $table->integer(EntityTarget::ID_ENTITY);
            $table->integer(EntityTarget::ID_TARGET);


            $table->foreign(EntityTarget::ID_ENTITY)
                ->references(Entity::ID)
                ->on(Entity::TABLE_NAME)->onDelete('cascade');

            $table->foreign(EntityTarget::ID_TARGET)
                ->references(Target::ID)
                ->on(Target::TABLE_NAME)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(EntityTarget::TABLE_NAME);
    }
}
