<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("history_id");
            $table->string("title");
            $table->integer("type"); // {text-data-number-yes_no-email-case_to_case-option}
            $table->string("option")->default("");
            $table->boolean("status")->default(true);
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
        Schema::dropIfExists('question_histories');
    }
}
