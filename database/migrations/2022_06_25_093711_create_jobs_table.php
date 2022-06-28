<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_id')->length(20);
            $table->string('company_name')->length(20);
            $table->string('job_title')->length(20);
            $table->longText('description')->length(20);
            $table->string('no_of_post')->length(20);
            $table->string('location')->length(20);
            $table->string('eligibility')->length(20);
            $table->string('experience')->length(20);
            $table->string('attachments')->nullable()->length(255);
            $table->date('date')->length(20);
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
        Schema::dropIfExists('jobs');
    }
}
