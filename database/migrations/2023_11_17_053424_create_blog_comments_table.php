<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comments', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('first_letter');
            $table->string('random_color');
            $table->unsignedBigInteger('blog_id');
            $table->longText('comment');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            // Define foreign keys
            $table->foreign('blog_id')->references('id')->on('blog');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_comments');
    }
}
