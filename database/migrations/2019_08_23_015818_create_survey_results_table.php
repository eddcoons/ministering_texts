<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_results_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('path');
            $table->timestamps();
        });
    }
}
