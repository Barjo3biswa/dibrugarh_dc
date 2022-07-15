<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpcomingEntrepreneurEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upcoming_entrepreneur_events', function (Blueprint $table) {
            $table->id();
            $table->string('event_id')->length(100);
            $table->string('event_name')->length(100);
            $table->date('event_date');
            $table->longText('description');
            $table->string('attachment');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('upcoming_entrepreneur_events');
    }
}
