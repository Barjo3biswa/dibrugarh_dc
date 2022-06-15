<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Ramsey\Uuid\v1;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('application_id')->length(50);
            $table->string('training_id')->length(50);
            $table->string('training_name')->length(50);
            $table->string('app_name')->length(100);
            $table->string('app_father_name')->length(100);
            $table->string('app_mother_name')->length(100);
            $table->string('app_email')->length(100);
            $table->string('app_phone')->length(100);
            $table->string('app_dob')->length(100);
            $table->string('app_qualification')->length(100);
            $table->string('app_gender')->length(100);
            $table->string('p_vill')->length(100);
            $table->string('p_district')->length(100);
            $table->string('p_state')->length(100);
            $table->string('p_zip')->length(100);
            $table->string('p_po')->length(100);
            $table->string('p_ps')->length(100);
            $table->string('per_vill')->length(100);
            $table->string('per_district')->length(100);
            $table->string('per_state')->length(100);
            $table->string('per_zip')->length(100);
            $table->string('per_po')->length(100);
            $table->string('per_ps')->length(100);

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
        Schema::dropIfExists('applicants');
    }
}
