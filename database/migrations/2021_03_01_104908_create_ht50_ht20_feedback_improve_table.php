<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHt50Ht20FeedbackImproveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht50_ht20_feedback_improve', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('feedback_id');
            $table->bigInteger('improve_id');
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
        Schema::dropIfExists('ht50_ht20_feedback_improve');
    }
}
