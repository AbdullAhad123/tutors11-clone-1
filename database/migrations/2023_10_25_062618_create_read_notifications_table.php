<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('read_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('notification_id'); // Foreign key reference
            $table->longText('user_ids');
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('notification_id')
                ->references('id')
                ->on('notifications')
                ->onDelete('cascade'); // You can adjust the "onDelete" behavior as needed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('read_notifications');
    }
}
