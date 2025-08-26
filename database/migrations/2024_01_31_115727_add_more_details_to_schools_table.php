<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreDetailsToSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->longText('faq')->nullable();
            $table->longText('about')->nullable();
            $table->longText('term_dates')->nullable();
            $table->longText('how_to_apply')->nullable();
            $table->longText('whats_on_school')->nullable();
            $table->longText('pass_mark_details')->nullable();
            $table->longText('catchment_area_details')->nullable();
            $table->longText('admission_criteria_details')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schools', function (Blueprint $table) {
            //
        });
    }
}
