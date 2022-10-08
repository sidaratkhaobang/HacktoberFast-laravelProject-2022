<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileJobEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_job_events', function (Blueprint $table) {
            $table->uuid('profile_id');
            $table->uuid('job_event_id');

            $table->primary(['profile_id', 'job_event_id'], 'profiles_groups_relation_pk');

            $table->foreign('profile_id')->references('id')->on('profiles')->cascadeOnDelete();
            $table->foreign('job_event_id')->references('id')->on('job_events')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_job_events');
    }
}
