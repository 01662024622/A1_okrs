<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHt50GiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht50_gifts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('coin');
            $table->string('plus');
            $table->string('note');
            $table->string('creat_by');
            $table->string('modify_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ht50_gifts');
    }
}
