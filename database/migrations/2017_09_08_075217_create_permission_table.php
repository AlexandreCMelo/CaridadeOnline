<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Permission;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Permission::TABLE_NAME, function (Blueprint $table) {
            $table->increments(Permission::TABLE_NAME);
            $table->integer(Permission::ID);
            $table->string(Permission::NAME, 128);
            $table->string(Permission::LABEL, 128);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Permission::TABLE_NAME);
    }
}
