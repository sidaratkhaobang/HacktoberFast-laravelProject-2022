<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('seq')->nullable();
            $table->string('name');
            $table->string('lastname');
            $table->text('address')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->string('tel', 100)->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
            $table->status();

            $table->foreign('province_id')->references('id')->on('provinces')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
