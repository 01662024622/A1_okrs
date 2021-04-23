<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHt50RevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht50_revenues', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('role_pt');
            $table->string('role_cs');
            $table->integer('coin');
            $table->integer('used');
            $table->string('level');
            $table->bigInteger('total');
            $table->bigInteger('2020')->default(0);
            $table->integer('t1')->default(0);
            $table->integer('t2')->default(0);
            $table->integer('t3')->default(0);
            $table->integer('t4')->default(0);
            $table->integer('t5')->default(0);
            $table->integer('t6')->default(0);
            $table->integer('t7')->default(0);
            $table->integer('t8')->default(0);
            $table->integer('t9')->default(0);
            $table->integer('t10')->default(0);
            $table->integer('t11')->default(0);
            $table->integer('t12')->default(0);
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
        Schema::dropIfExists('ht50_revenues');
    }
}
