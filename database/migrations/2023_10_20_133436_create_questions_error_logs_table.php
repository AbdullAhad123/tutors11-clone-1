<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsErrorLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_error_logs', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->bigInteger('question_id')->length(20);
            $table->bigInteger('user_id')->nullable()->length(20);
            $table->string('ip');
            $table->string('url');
            $table->boolean('is_index_question')->default(false);
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
        Schema::dropIfExists('questions_error_logs');
    }
}
