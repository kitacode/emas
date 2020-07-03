<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitialEmasTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('ktcd_emas.event_table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('place')->nullable();
            $table->string('address')->nullable();
            $table->string('theme')->nullable();
            $table->string('committee')->nullable();
            $table->string('timezone')->nullable();
            $table->string('date_format')->nullable();
            $table->string('time_format')->nullable();
            $table->string('datetime_format')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->longText('term_and_condition')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->boolean('show_barcode')->default(1);
            $table->boolean('is_published')->default(1);
            $table->timestamps();
        });

        Schema::create(config('ktcd_emas.session_type_table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->bigInteger('event_id')->index()->nullable();
            $table->timestamps();
        });

        Schema::create(config('ktcd_emas.session_table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->bigInteger('event_id')->index();
            $table->bigInteger('session_type_id')->index()->nullable();
            $table->boolean('is_published')->default(1);
            $table->timestamps();
        });

        Schema::create(config('ktcd_emas.speaker_table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->bigInteger('event_id')->index()->nullable();
            $table->bigInteger('session_id')->index()->nullable();
            $table->boolean('is_published')->default(1);
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
        Schema::dropTable(config('ktcd_emas.event_table'));
    }
}
