<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHt30KeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht30_keys', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ou_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('type')->default(0);
            $table->integer('result')->nullable();
            $table->integer('percent')->nullable();
            $table->integer('minus')->nullable();
            $table->integer('status')->default(0);
            $table->integer('create_by')->default(0);
            $table->integer('modify_by')->nullable();
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
        Schema::dropIfExists('ht30_keys');
    }
}
